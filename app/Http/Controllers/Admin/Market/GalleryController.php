<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Models\Market\Gallary;
use App\Models\Market\Product;
use App\Http\Controllers\Controller;
use tidy;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        return view('admin.market.product.gallary.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('admin.market.product.gallary.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif',
        ]);
        $inputs = $request->all();
        $inputs['product_id'] = $product->id;
        if ($request->hasFile('image')) {
            $picture = time() . ' ' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('uploads', $picture, 'public');
            $inputs['image'] = $path;

            Gallary::create($inputs);
            return redirect()->route('admin.market.gallery.index', $product->id)
                ->with('swal-success', 'گالری شما با موفقیت ایجاد شد');
        }
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(Product $product, Gallary $gallary)
    {
        $gallary->delete();
        return redirect()->route('admin.market.gallery.index', $product->id)
            ->with('swal-success', 'گالری شما با موفقیت حذف شد');
    }
}
