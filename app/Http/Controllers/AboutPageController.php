<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutPageController extends Controller
{
    // Show the about page
    public function show()
    {
        $aboutPage = AboutPage::first();
        return view('about.show', compact('aboutPage'));
    }

    // Show the create/edit form
    public function edit()
    {
        $aboutPage = AboutPage::first();
        return view('about.edit', compact('aboutPage'));
    }

    // Store or update about page details
    public function update(Request $request)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'skills' => 'required|string',
            'youtube_link' => 'nullable|url',
        ]);

        $aboutPage = AboutPage::first();

        if (!$aboutPage) {
            $aboutPage = new AboutPage();
        }

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($aboutPage->image) {
                Storage::delete('public/about_images/' . $aboutPage->image);
            }

            $path = $request->file('image')->store('public/about_images');
            $validated['image'] = basename($path);
        }

        $aboutPage->fill($validated);
        $aboutPage->save();

        return redirect()->route('about.show')->with('status', 'About page updated successfully!');
    }
}
