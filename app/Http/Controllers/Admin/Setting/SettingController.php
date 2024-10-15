<?php

namespace App\Http\Controllers\Admin\Setting;

use Illuminate\Http\Request;
use App\Models\Setting\Setting;
use Database\Seeders\SettingSeeder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Setting\SettingRequest;

class SettingController extends Controller
{

    public function index()
    {
        $setting = Setting::first();
        if ($setting === null) {
            $default = new SettingSeeder();
            $default->run();
            $setting = Setting::first();
        }
        return view('admin.setting.index', compact('setting'));
    }


    public function edit(Setting $setting)
    {
        return view('admin.setting.edit', compact('setting'));
    }

    //--- update

    public function update(Setting $setting, SettingRequest $request)
    {
        if ($request->hasFile('logo')) {
            $fileLogo = time() . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->storeAs('uploads', $fileLogo, 'public');
            if ($setting->logo) {
                Storage::disk('public')->delete($setting->logo);
            }
            $setting->logo = 'uploads/' . $fileLogo;
        }
        if ($request->hasFile('icon')) {
            $fileIcon = time() . '_' . $request->file('icon')->getClientOriginalName();
            $request->file('icon')->storeAs('uploads', $fileIcon, 'public');

            if ($setting->icon) {
                Storage::disk('public')->delete($setting->icon);
            }
            $setting->icon = 'uploads/' . $fileIcon;
        }

        $setting->fill($request->except(['logo', 'icon']));
        $setting->save();

        return redirect()->route('admin.setting.index')
            ->with('swal-success', 'تنظیمات شما با موفقیت ثبت شد');
    }
}
