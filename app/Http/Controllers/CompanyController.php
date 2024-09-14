<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    // Show a list of companies
    public function index()
    {
        $companies = Company::all();
        return view('company.index', compact('companies'));
    }

    // Show the create form
    public function create()
    {
        return view('company.create');
    }

    // Store a new company
    public function store(Request $request)
    {
        $validated = $request->validate([
           
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/company_images');
            $validated['image'] = basename($path);
        }

        Company::create($validated);

        return redirect()->route('company.index')->with('status', 'Company added successfully!');
    }

    // Show the edit form
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    // Update company information
    public function update(Request $request, Company $company)
    {
        $validated = $request->validate([
           
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($company->image) {
                Storage::delete('public/company_images/' . $company->image);
            }

            $path = $request->file('image')->store('public/company_images');
            $validated['image'] = basename($path);
        }

        $company->update($validated);

        return redirect()->route('company.index')->with('status', 'Company updated successfully!');
    }

    // Delete a company
    public function destroy(Company $company)
    {
        // Delete the image if it exists
        if ($company->image) {
            Storage::delete('public/company_images/' . $company->image);
        }

        $company->delete();

        return redirect()->route('company.index')->with('status', 'Company deleted successfully!');
    }
}
