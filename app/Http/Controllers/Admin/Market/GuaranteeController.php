<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Models\Market\Guarantee;
use App\Http\Controllers\Controller;

class GuaranteeController extends Controller
{
    public function index(Product $product)
    {
        return view('admin.market.guarantee.index', compact('product'));
    }

    public function create(Product $product)
    {
        return view('admin.market.guarantee.create', compact('product'));
    }



    public function store(Product $product, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price_increase' => 'required|numeric',
        ]);


        $validatedData['product_id'] = $product->id;
        Guarantee::create($validatedData);
        return redirect()->route('admin.market.guarantee.index', $product->id)
            ->with('swal-success', 'گرانتی شما با موفقیت ایجاد شد شد');
    }

    public function destroy(Product $product, Guarantee $guarantee)
    {
        if ($guarantee->product_id !== $product->id) {
            return redirect()->route('admin.market.guarantee.index', $product->id)
                             ->with('swal-error', 'گارانتی موردنظر یافت نشد یا به این محصول تعلق ندارد.');
        }
    
        $guarantee->delete();
        return redirect()->route('admin.market.guarantee.index', $product->id)
                         ->with('swal-success', 'گارانتی با موفقیت حذف شد.');
    }
    
}
