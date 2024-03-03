<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddDecreaseRequest;
use App\Http\Requests\AddIncreaseRequest;
use App\Models\ProductDetail;
use App\Http\Requests\StoreProductDetailRequest;
use App\Http\Requests\UpdateProductDetailRequest;
use App\Models\Product;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductDetail $productDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductDetail $productDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductDetailRequest $request, ProductDetail $productDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductDetail $detail)
    {
        $detail->delete();

        return redirect()->route('products.index')->with('success', 'تم إلغاء المعاملة');
    }

    public function addIncrease(AddIncreaseRequest $request, Product $product)
    {
        $product->details()->create($request->validated());

        return redirect()->route('products.index')->with('success', 'تم إضافة الكمية');
    }

    public function addDecrease(AddDecreaseRequest $request, Product $product)
    {
        $product->details()->create($request->validated());

        return redirect()->route('products.index')->with('success', 'تم سحب الكمية');
    }
}
