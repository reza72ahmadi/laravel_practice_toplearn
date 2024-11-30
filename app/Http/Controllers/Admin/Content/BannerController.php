<?php

namespace App\Http\Controllers\Admin\Content;

use App\Models\Content\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Content\BannerRequest;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $positions = Banner::$positions;
        return view('admin.content.banner.index', compact('banners', 'positions'));
    }


    public function create()
    {
        $positions = Banner::$positions;
        return view('admin.content.banner.create', compact('positions'));
    }

    public function store(BannerRequest $request)
    {
        $inputs =  $request->validated();
        if ($request->hasFile('image')) {
            $logoName = time() . '-' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('banner', $logoName, 'public');
            $inputs['image'] = $path;

            Banner::create($inputs);
            return redirect()->route('admin.content.banner.index')
                ->with('swal-success', 'دسته بندی جدید شما با موفقیت ساخته شد');
        }
    }

    public function edit(Banner $banner)
    {
        $positions = Banner::$positions;
        return view('admin.content.banner.edit', compact('banner', 'positions'));
    }

    public function update(BannerRequest $request, Banner $banner)
    {
        $inputs = $request->validated();

        if ($request->hasFile('image')) {
            $logoName = time() . '-' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('banner', $logoName, 'public');
            $inputs['image'] = $path;

            // Delete the old logo if it exists
            if ($banner->image) {
                Storage::disk('public')->delete($banner->image);
            }
        }

        $banner->update($inputs);
        return redirect()->route('admin.content.banner.index')
            ->with('swal-success', 'برند شما با موفقیت ویرایش شد');
    }

    public function status(Banner $banner)
    {
        $banner->status = $banner->status == 0 ? 1 : 0;
        $result =  $banner->save();
        if ($result) {
            if ($banner->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }


    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('admin.content.banner.index')
            ->with('swal-success', 'برند شما با موفقیت حذف شد');
    }
}
