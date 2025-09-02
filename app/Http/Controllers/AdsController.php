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
    public function index()
    {
        $ads = \app\Models\Ad::latest()->get();
        return view('ads.index', compact('ads'));
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

        \app\Models\Ad::create([
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
        $product = \app\Models\Ad::where('slug', $ads);
        return view('ads.show', $product);
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

        $product = \app\Models\Ad::where('slug', $ads);
        $product->update($validated);
        $product->save();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $ads)
    {
        $product = \app\Models\Ad::where('slug', $ads);
        $productImages = \app\Models\Photo::where('ads_id', $product->id);

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
