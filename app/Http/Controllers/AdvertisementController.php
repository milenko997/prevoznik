<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function publicIndex()
    {
        $ads = Advertisement::latest()->get();
        return view('advertisements.public-index', compact('ads'));
    }

    public function userIndex()
    {
        $ads = Advertisement::where('user_id', Auth::id())->latest()->get();
        return view('advertisements.user-index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('advertisements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('ads', 'public');
        }

        $baseSlug = Str::slug($request->title, '_');
        $slug = $baseSlug;
        $counter = 1;

        while(Advertisement::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '_' . $counter;
            $counter++;
        }

        Advertisement::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('advertisements.user')->with('success', 'Advertisement created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($slug)
    {
        $ad = Advertisement::where('slug', $slug)->firstOrFail();
        return view('advertisements.show', compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($slug)
    {
        $ad = Advertisement::where('slug', $slug)->firstOrFail();

        return view('advertisements.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $slug)
    {
        $ad = Advertisement::where('slug', $slug)->firstOrFail();

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $oldTitle = $ad->title;
        $ad->title = $request->title;
        $ad->description = $request->description;

        if ($request->title !== $oldTitle) {
            $baseSlug = Str::slug($request->title, '_');
            $slugToCheck = $baseSlug;
            $counter = 1;

            while (Advertisement::where('slug', $slugToCheck)->where('id', '!=', $ad->id)->exists()) {
                $slugToCheck = $baseSlug . '_' . $counter++;
            }

            $ad->slug = $slugToCheck;
        }

        if ($request->hasFile('image')) {
            $ad->image = $request->file('image')->store('ads', 'public');
        }

        $ad->save();

        return redirect()->route('advertisements.show', $ad->slug)->with('success', 'Advertisement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
