<?php

namespace App\Http\Controllers\Admin\Market;

use App\Models\Market\Brand;
use Illuminate\Http\Request;
use GuzzleHttp\Handler\Proxy;
use App\Models\Market\Product;
use App\Models\Market\ProductMeta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Market\ProductCategory;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Market\ProductRequest;

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
        $categories = ProductCategory::where('parent_id', null)->get();
        $brands = Brand::all();
        return view('admin.market.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $inputs = $request->validated();

        if (isset($request->published_at)) {
            $realTimeStamp = substr($request->published_at, 0, 10);
            $inputs['published_at'] = date("Y-m-d H:i:s", intval($realTimeStamp));
        }

        if ($request->hasFile('image')) {
            $picName = time() . ' ' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads/', $picName, 'public');
            $inputs['image'] = 'uploads/' . $picName;
        }

        DB::transaction(
            function () use ($inputs, $request) {
                $product = Product::create($inputs);
                $metas = array_combine($request->meta_key, $request->meta_value);
                foreach ($metas as $key => $value) {
                    ProductMeta::create([
                        'meta_key' => $key,
                        'meta_value' => $value,
                        'product_id' => $product->id
                    ]);
                }
            }
        );
        return redirect()->route('admin.market.product.index')
            ->with('swal-success', 'محصول با موفقیت ذخیره شد');
    }

    /**
     * Display the specified resource.
     */

    public function edit(Product $product)
    {
        $categories = ProductCategory::where('parent_id', null)->get();
        $brands = Brand::all();
        return view('admin.market.product.edit', compact('product', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {

        $inputs = $request->validated();

        if (isset($request->published_at)) {
            $realTimeStamp = substr($request->published_at, 0, 10);
            $inputs['published_at'] = date("Y-m-d H:i:s", intval($realTimeStamp));
        }

        if ($request->hasFile('image')) {
            $picName = time() . ' ' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads/', $picName, 'public');
            $inputs['image'] = 'uploads/' . $picName;

            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
        }
        $product->update($inputs);

        $meta_keys = $request->meta_key;
        $meta_values = $request->meta_value;
        $meta_ids = array_keys($meta_keys);

        $metas = array_map(function ($meta_id, $meta_key, $meta_value) {
            return [
                'meta_id' => $meta_id,
                'meta_key' => $meta_key,
                'meta_value' => $meta_value,
            ];
        }, $meta_ids, $meta_keys, $meta_values);

        foreach ($metas as $meta) {
            ProductMeta::where('id', $meta['meta_id'])->update([
                'meta_key' => $meta['meta_key'],
                'meta_value' => $meta['meta_value'],
            ]);
        }

        return redirect()->route('admin.market.product.index')
            ->with('swal-success', 'برند شما با موفقیت ویرایش شد');
    }

    // public function destroy(Product $product)
    // {
    //     if ($product) {
    //         $imagePath = storage_path('uploads/' . $product->imagePath);
    //         if (file_exists($imagePath) && is_file($imagePath)) {
    //             try {
    //                 unlink($imagePath);
    //             } catch (\Exception $e) {
    //                 Log::error('Failed to delete image: ' . $e->getMessage());
    //             }
    //         }
    //         $product->delete();
    //     }
    //     return redirect()->route('admin.market.product.index')
    //     ->with('swal-success', 'برند شما با موفقیت حذف شد');
    // }

    public function destroy(Product $product)
    {
        if ($product) {
            DB::transaction(function () use ($product) {
                if ($product->image && Storage::disk('public')->exists($product->image)) {
                    try {
                        Storage::disk('public')->delete($product->image);
                    } catch (\Exception $e) {
                        Log::error('Failed to delete product image: ' . $e->getMessage());
                        throw $e; // Re-throw the exception to rollback the transaction
                    }
                }
                $product->delete();
            });
            return redirect()->route('admin.market.product.index')
                ->with('swal-success', 'برند شما با موفقیت حذف شد');
        }
        return redirect()->route('admin.market.product.index')
            ->with('swal-error', 'برند مورد نظر پیدا نشد');
    }
}
