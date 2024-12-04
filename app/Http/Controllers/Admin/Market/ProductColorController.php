<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\ProductRequest;
use App\Models\Market\Product;
use App\Models\Market\ProductColor;
use Illuminate\Http\Request;

class ProductColorController extends Controller
{

    public function index(Product $product)
    {

        return view('admin.market.product.color.index', compact('product'));
    }

    public function create(Product $product)
    {
        return view('admin.market.product.color.create', compact('product'));
    }


    public function store(Request $request, Product $product)
    {
        $request->validate([
            'color_name' => "required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u",
            'price_increase' => 'required|numeric',
            'color' => 'required|max:120',
        ]);
        $inputs = $request->all();
        $inputs['product_id'] = $product->id;

        ProductColor::create($inputs);

        return redirect()->route('admin.market.color.index', $product->id)
            ->with('swal-success', 'رنگ شما با موفقیت ایجاد شد');
    }

    public function destroy(Product $product, ProductColor $productColor)
    {
        $productColor->delete();
        return redirect()->route('admin.market.color.index', $product->id)
            ->with('swal-success', 'رنگ شما با موفقیت حذف شد');
    }
}
