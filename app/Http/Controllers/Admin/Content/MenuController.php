<?php

namespace App\Http\Controllers\Admin\Content;

use App\Models\Content\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\MenuRequest;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.content.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = Menu::where('parent_id', null)->get();
        return view('admin.content.menu.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request)
    {
        Menu::create($request->all());
        return redirect()->route('admin.content.menu.index')
            ->with('swal-success', 'مینوی شما با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $parent_menus = Menu::where('parent_id', null)->get()->except($menu->id);
        return view('admin.content.menu.edit', compact('menu', 'parent_menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        $menu->update($request->all());
        return redirect()->route('admin.content.menu.index')
            ->with('swal-success', 'مینوی شما با موفقیت ثبت شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('admin.content.menu.index')
            ->with('swal-success', 'مینوی شما با موفقیت حذف شد');
    }
    // status
    public function status(Menu $menu)
    {

        $menu->status = $menu->status == 0 ? 1 : 0;
        $result =  $menu->save();

        if ($result) {
            if ($menu->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
