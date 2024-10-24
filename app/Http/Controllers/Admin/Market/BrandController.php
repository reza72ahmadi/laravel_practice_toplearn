<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\BrandRequest;
use App\Models\Market\Brand;
use Illuminate\Support\Facades\Storage;

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

            $logoName = time() . '-' .  $request->file('logo')->getClientOriginalName();
            $request->file('logo')->storeAs('brand/', $logoName, 'public');
            $inputs['logo'] = 'brand/' . $logoName;

            Brand::create($inputs);
            return redirect()->route('admin.market.brand.index')
                ->with('swal-success', 'دسته بندی شما با موفقیت ویرایش شد');
        }
    }

    public function edit(Brand $brand)
    {
        return view('admin.market.brand.edit', compact('brand'));
    }
    // 

    public function update(BrandRequest $request, Brand $brand)
    {     
        $inputs = $request->validated();

        if ($request->hasFile('logo')) {
            $logoName = time() . '-' .  $request->file('logo')->getClientOriginalName();
            $request->file('logo')->storeAs('brand/', $logoName, 'public');
            $inputs['logo'] = 'brand/' . $logoName;

            if ($brand->logo) {
                Storage::disk('public')->delete($brand->logo);
            }

            $brand->update($inputs);
        }
        return redirect()->route('admin.market.brand.index')
        ->with('swal-success', 'دسته بندی شما با موفقیت ویرایش شد');
    }
    //------------------------------
//     public function update(BrandRequest $request, Brand $brand)
// {
//     $inputs = $request->validated();

//     // Check if a new logo is uploaded
//     if ($request->hasFile('logo')) {
//         $logoName = time() . '-' . $request->file('logo')->getClientOriginalName();
//         // Store the new logo in the 'brand' folder within the 'public' disk
//         $request->file('logo')->storeAs('brand/', $logoName, 'public');
//         $inputs['logo'] = 'brand/' . $logoName;

//         // Delete the old logo if it exists
//         if ($brand->logo) {
//             Storage::disk('public')->delete($brand->logo);
//         }
//     }
//     $brand->update($inputs);
//     return redirect()->route('admin.market.brand.index')
//         ->with('swal-success', 'برند با موفقیت ویرایش شد');
// }


















    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('admin.market.brand.index')
            ->with('swal-success', 'دسته بندی شما با موفقیت حذف شد');
    }
}
