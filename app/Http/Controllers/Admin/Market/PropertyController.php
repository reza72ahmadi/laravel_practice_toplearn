<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\ProductCategory;
use App\Models\Market\CategoryAttribute;
use App\Http\Requests\Admin\Market\PropertyRequest;

class PropertyController extends Controller
{
    public function index()
    {
        $category_attribute = CategoryAttribute::all();
        return view('admin.market.property.index', compact('category_attribute'));
    }
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategory::where('parent_id', null)->get();
        return view('admin.market.property.create', compact('categories'));
    }


    public function store(PropertyRequest $request)
    {
        CategoryAttribute::create($request->validated());

        return redirect()->route('admin.market.property.index')
            ->with('swal-success', 'فرم شما با موفقیت ایجاد شد');
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
    public function edit(CategoryAttribute $categoryAttribute)
    {
        $categories = ProductCategory::where('parent_id', null)->get();
        return view('admin.market.property.edit', compact('categoryAttribute', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyRequest $request, CategoryAttribute $categoryAttribute)
    {
        $categoryAttribute->update($request->validated());
        return redirect()->route('admin.market.property.index')
            ->with('swal-success', 'فرم شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryAttribute $categoryAttribute)
    {
        $categoryAttribute->delete();

        return redirect()->route('admin.market.property.index')
            ->with('swal-success', 'فرم شما با موفقیت حذف شد');
    }
}
