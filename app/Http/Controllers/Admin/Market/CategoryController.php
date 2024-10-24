<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\ProductCategory;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Market\ProductCategoryRequest;

class CategoryController extends Controller
{

    public function index()
    {
        $productsCategories = ProductCategory::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.market.category.index', compact('productsCategories'));
    }

    public function create()
    {
        $categories = ProductCategory::where('parent_id', null)->get();
        return view('admin.market.category.create', compact('categories'));
    }

    public function store(ProductCategoryRequest $request)
    {
        $inputs = $request->validated();
        if ($request->hasFile('image')) {
            $imageFileName = time() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads', $imageFileName, 'public');
            $inputs['image'] = 'uploads/' . $imageFileName;

            ProductCategory::create($inputs);
            return redirect()->route('admin.market.category.index')
                ->with('swal-success', 'دسته بندی شما با موفقیت ثبت شد');
        }
    }

    // edit
    public function edit(ProductCategory $category)
    {
        $categories = ProductCategory::where('parent_id', null)->get()->except($category->id);
        return view('admin.market.category.edit', compact('categories', 'category'));
    }
    // update
    public function update(ProductCategoryRequest $request, ProductCategory $category)
    {

        $inputs = $request->validated();
        if ($request->hasFile('image')) {
            $imageFileName = time() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads', $imageFileName, 'public');
            $inputs['image'] = 'uploads/' . $imageFileName;

            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
        }
        $category->update($inputs);
        return redirect()->route('admin.market.category.index')
            ->with('swal-success', 'دسته بندی شما با موفقیت ویرایش شد');
    }
    // destroy
    public function destroy(ProductCategory $category)
    {

        $category->delete();
        return redirect()->route('admin.market.category.index')
            ->with('swal-success', 'دسته بندی شما با موفقیت حذف شد');
    }
}
