<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Http\Controllers\Controller;
use App\Models\Market\Brand;
use App\Models\Market\ProductCategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.market.product.index', compact('products'));
    }

    // create
    public function create()
    {
        $categories = ProductCategory::all();
        $brands = Brand::all();
        return view('admin.market.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
