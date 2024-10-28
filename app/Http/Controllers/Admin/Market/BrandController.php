<?php

namespace App\Http\Controllers\Admin\Market;

use App\Models\Market\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Market\BrandRequest;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.market.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.market.brand.create');
    }

    public function store(BrandRequest $request)
    {
        $inputs = $request->validated();
        if ($request->hasFile('logo')) {
            $logoName = time() . '-' . $request->file('logo')->getClientOriginalName();
            $path = $request->file('logo')->storeAs('brand', $logoName, 'public');
            $inputs['logo'] = $path;

            Brand::create($inputs);
            return redirect()->route('admin.market.brand.index')
                ->with('swal-success', 'برند شما با موفقیت ایجاد شد');
        }
    

        return redirect()->route('admin.market.brand.index')
            ->with('swal-error', 'آپلود لوگو الزامی است');
    }

    public function edit(Brand $brand)
    {
        return view('admin.market.brand.edit', compact('brand'));
    }

    public function update(BrandRequest $request, Brand $brand)
    {
        $inputs = $request->validated();

        if ($request->hasFile('logo')) {
            $logoName = time() . '-' . $request->file('logo')->getClientOriginalName();
            $path = $request->file('logo')->storeAs('brand', $logoName, 'public');
            $inputs['logo'] = $path;

            // Delete the old logo if it exists
            if ($brand->logo) {
                Storage::disk('public')->delete($brand->logo);
            }
        }

        $brand->update($inputs);
        return redirect()->route('admin.market.brand.index')
            ->with('swal-success', 'برند شما با موفقیت ویرایش شد');
    }



    public function destroy(Brand $brand)
    {
        if ($brand) {
            DB::transaction(function () use ($brand) {
                if ($brand->logo && Storage::disk('public')->exists($brand->logo)) {
                    try {
                        Storage::disk('public')->delete($brand->logo);
                    } catch (\Exception $e) {
                        Log::error('Failed to delete brand image: ' . $e->getMessage());
                        throw $e; // Re-throw the exception to rollback the transaction
                    }
                }
                $brand->delete();
            });
            return redirect()->route('admin.market.brand.index')
                ->with('swal-success', 'برند شما با موفقیت حذف شد');
        }
        return redirect()->route('admin.market.brand.index')
            ->with('swal-error', 'برند مورد نظر پیدا نشد');
    }
}



