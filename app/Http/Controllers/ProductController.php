<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'quantity_alert' => $request->quantity_alert,
        ]);

        $product->details()->create([
            'increase' => $request->increase,
            'price' => $request->price,
            'notes' => $request->notes,
        ]);

        return redirect()->route('products.index')->with('success', 'تم اضافة بضاعة جديدة');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $details = $product->details()->latest()->get();

        return view('products.edit', compact('product', 'details'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return redirect()->route('products.index')->with('success', 'تم تعديل البضاعة');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->details()->delete();
        $product->delete();

        return redirect()->route('products.index')->with('success', 'تم ازالة البضاعة');
    }
}
