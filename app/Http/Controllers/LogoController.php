<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    // Show the logo
    public function show()
    {
        $logo = Logo::first();
        return view('logo.show', compact('logo'));
    }

    // Show the form to edit the logo
    public function edit()
    {
        $logo = Logo::first();
        return view('logo.edit', compact('logo'));
    }

    // Update the logo
    public function update(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $logo = Logo::first();

        if (!$logo) {
            $logo = new Logo();
        }

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($logo->image) {
                Storage::delete('public/logos/' . $logo->image);
            }

            $path = $request->file('image')->store('public/logos');
            $logo->image = basename($path);
        }

        $logo->save();

        return redirect()->route('logo.show')->with('status', 'Logo updated successfully!');
    }
}
