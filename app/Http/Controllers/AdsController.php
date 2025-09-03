<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
     {
        $categoryId = $request->input('category');
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');
        $condition = $request->input('condition');
        $location = $request->input('location');
        $search = $request->input('search');

        $query = \App\Models\Ad::query();
        if(!empty($search) && $search = '') {
            $query->where('title', 'like', "%$search%");
        }

        if(!empty($categoryId)) {
            $query->where('category_id', $categoryId);
        }
        if(!empty($minPrice)) {
            $query->where('price', '>=', $minPrice);
        }
        if(!empty($maxPrice)) {
            $query->where('price', '<=', $maxPrice);
        }
        if(!empty($condition)) {
            $query->where('condition', $condition);
        }
        if(!empty($location)) {
            $query->where('location', $location);
        }

        $ads = $query->with(relations: ['category', 'photos'])->latest()->paginate();
        $categories = \App\Models\Category::all();
        return view('ads.index', compact('ads', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
  
    public function create()
    {
        return view('ads.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'photos.*' => 'required|image|max:2048',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'condition' => 'required|in:new,good,used',
        ]);
      
        $ad = \App\Models\Ad::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
            'location' => $request->location,
            'condition' => $request->condition,
            'user_id' => Auth::id(),
            'created_by' => Auth::id(),
            'slug' => \Str::slug($request->title) . '-' . uniqid(),
        ]);
      
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('ads_photos', 'public');
                \App\Models\Photo::create([
                    'ad_id' => $ad->id,
                    'path' => $path
                ]);
            }
        }

        return redirect()->route('ads.show', $ad->slug)->with('success', 'Annonce créée avec succès!');
    }
  
    /**
     * Display the specified resource.
     */
  
    public function show(string $ads)
    {
        $product = \App\Models\Ad::where('slug', $ads);
        return view('ads.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $ad = \App\Models\Ad::where('slug', $slug)->firstOrFail();
        return view('ads.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $ad = \App\Models\Ad::where('slug', $slug)->firstOrFail();
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'photos.*' => 'nullable|image|max:2048',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'condition' => 'required|in:new,good,used',
            'delete_photos.*' => 'nullable|exists:photos,id'
        ]);
        $ad->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
            'location' => $request->location,
            'condition' => $request->condition,
            'updated_by' => Auth::id(),
        ]);

        
        if ($request->has('delete_photos')) {
            foreach ($request->delete_photos as $photoId) {
                $photo = \App\Models\Photo::find($photoId);
                if ($photo && $photo->ad_id === $ad->id) {
                    if (File::exists('storage/' . $photo->path)) {
                        File::delete('storage/' . $photo->path);
                    }
                    $photo->delete();
                }
            }
        }

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('ads_photos', 'public');
                \App\Models\Photo::create([
                    'ad_id' => $ad->id,
                    'path' => $path
                ]);
            }
        }

        return redirect()->route('ads.show', $ad->slug)->with('success', 'Annonce mise à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $ads)
    {
        $product = \App\Models\Ad::where('slug', $ads);
        $productImages = \App\Models\Photo::where('ads_id', $product->id);

        foreach ($productImages as $image) {
            if(File::exists($image->path)){
                File::delete($image->path);
            }
            $image->delete();
        }

        $product->delete();
        // $product->deleted_by(Auth::user()->id);
    }
}
