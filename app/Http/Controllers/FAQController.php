<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    // Display the list of FAQs
    public function index()
    {
        $faqs = FAQ::all();
        return view('faqs.index', compact('faqs'));
    }

    // Show the form for creating a new FAQ
    public function create()
    {
        return view('faqs.create');
    }

    // Store a newly created FAQ in the database
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        FAQ::create($request->all());

        return redirect()->route('faqs.index')->with('status', 'FAQ created successfully!');
    }

    // Show the form for editing the specified FAQ
    public function edit(FAQ $faq)
    {
        return view('faqs.edit', compact('faq'));
    }

    // Update the specified FAQ in the database
    public function update(Request $request, FAQ $faq)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq->update($request->all());

        return redirect()->route('faqs.index')->with('status', 'FAQ updated successfully!');
    }

    // Remove the specified FAQ from the database
    public function destroy(FAQ $faq)
    {
        $faq->delete();

        return redirect()->route('faqs.index')->with('status', 'FAQ deleted successfully!');
    }
}
