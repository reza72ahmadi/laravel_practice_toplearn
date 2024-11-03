<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\PropertyValueRequest;
use App\Models\Market\CategoryAttribute;
use App\Models\Market\CategoryValue;
use Illuminate\Http\Request;

class PropertyValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryAttribute $categoryAttribute)
    {
        return view('admin.market.property.value.index', compact('categoryAttribute'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CategoryAttribute $categoryAttribute)
    {
        return view('admin.market.property.value.create', compact('categoryAttribute'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyValueRequest $request, CategoryAttribute $categoryAttribute)
    {
        $inputs = $request->validated();
        $inputs['value'] = json_encode(['value' => $request->value, 'price_increase' => $request->price_increase]);
        $inputs['category_attribute_id'] = $categoryAttribute->id;

        CategoryValue::create($inputs);
        return redirect()->route('admin.market.value.index', $categoryAttribute->id)
            ->with('swal-success', 'فرم مقدار شما با موفقیت ایجاد شد');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryAttribute $categoryAttribute, CategoryValue $value)
    {
        return view('admin.market.property.value.edit', compact('categoryAttribute', 'value'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyValueRequest $request, CategoryAttribute $categoryAttribute, CategoryValue $value)
    {
        $inputs = $request->validated();
        $inputs['value'] = json_encode(['value' => $request->value, 'price_increase' => $request->price_increase]);
        $inputs['category_attribute_id'] = $categoryAttribute->id;

        $value->update($inputs);
        return redirect()->route('admin.market.value.index', $categoryAttribute->id)
            ->with('swal-success', 'فرم مقدار شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryAttribute $categoryAttribute, CategoryValue $value)
    {
        $value->delete();
        return redirect()->route('admin.market.value.index', $categoryAttribute->id)
            ->with('swal-success', 'فرم مقدار شما با موفقیت حذف شد');
    }
}
