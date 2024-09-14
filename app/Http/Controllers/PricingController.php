<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    // Show all pricing plans
    public function index()
    {
        $pricings = Pricing::all();
        return view('pricing.index', compact('pricings'));
    }

    // Show the create form
    public function create()
    {
        return view('pricing.create');
    }

    // Store a new pricing plan
    public function store(Request $request)
    {
        $request->validate([
            'plan_name' => 'required|string|max:255',
            'description' => 'required|string',
            'features' => 'required|array',
            'price' => 'required|numeric',
        ]);

        $pricing = new Pricing();
        $pricing->plan_name = $request->plan_name;
        $pricing->description = $request->description;
        $pricing->features = json_encode($request->features); // Store features as JSON
        $pricing->price = $request->price;
        $pricing->save();

        return redirect()->route('pricing.index')->with('status', 'Pricing plan created successfully!');
    }

    // Show the edit form
    public function edit($id)
    {
        $pricing = Pricing::findOrFail($id);
        return view('pricing.edit', compact('pricing'));
    }

    // Update a pricing plan
    public function update(Request $request, $id)
    {
        $request->validate([
            'plan_name' => 'required|string|max:255',
            'description' => 'required|string',
            'features' => 'required|array',
            'price' => 'required|numeric',
        ]);

        $pricing = Pricing::findOrFail($id);
        $pricing->plan_name = $request->plan_name;
        $pricing->description = $request->description;
        $pricing->features = json_encode($request->features); // Store features as JSON
        $pricing->price = $request->price;
        $pricing->save();

        return redirect()->route('pricing.index')->with('status', 'Pricing plan updated successfully!');
    }
}
