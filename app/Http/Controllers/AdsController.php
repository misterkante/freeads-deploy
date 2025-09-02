<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;

class AdsController extends Controller
{
    public function create()
    {
        return view('post_new_ad');
    }

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

        Ad::create([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'photo' => $photoPath,
            'price' => $request->price,
            'location' => $request->location,
            'condition' => $request->condition,
        ]);
    }

    public function getAds()
{
    $ads = Ad::latest()->get(); 
    return view('ads.index', compact('ads'));
}
}
