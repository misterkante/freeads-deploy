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

        //recuperer les infos depuis l'URI
        $categoryId = $request->input('category');
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');
        $condition = $request->input('condition');
        $location = $request->input('location');
        $search = $request->input('search');

        //rechercher le produit
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
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'required|image|max:2048',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'condition' => 'required|in:new,good,used',
        ]);

        $photoPath = $request->file('photo')->store('ads_photos', 'public');

        \App\Models\Ad::create([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'photo' => $photoPath,
            'price' => $request->price,
            'location' => $request->location,
            'condition' => $request->condition,
        ]);
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
    public function edit(string $ads)
    {
        return view('ads.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $ads)
    {
        // data validation
        $validated = $request->validate([
            'title' => 'string',
            'category' => 'string',
            'description' => 'string',
            'photos.*' => 'required|image|mimes:png,jpg,jpeg,webp',
            'price' => 'decimal:0,2',
            'location' => 'string',
            'condition' => 'enum:good,new,used',
            'slug' => 'string',
        ]);

        $product = \App\Models\Ad::where('slug', $ads);
        $product->update($validated);
        $product->save();
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
