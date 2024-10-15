<?php

namespace App\Http\Controllers\Admin\Content;

use App\Models\Content\Page;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\PageRequest;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.content.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.content.page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request)
    {
        Page::create($request->all());
        return redirect()->route('admin.content.page.index')
            ->with('swal-success', 'صفحه شما با موفقیت ذخیره شد');
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
    public function edit(Page $page)
    {
        return view('admin.content.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageRequest $request, Page $page)
    {
        $page->update($request->all());
        return redirect()->route('admin.content.page.index')
            ->with('swal-success', 'صفحه شما با موفقیت ذخیره شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.content.page.index')
            ->with('swal-success', 'صفحه شما با موفقیت ذخیره شد');
    }
    // status
    public function status(Page $page)
    {

        $page->status = $page->status == 0 ? 1 : 0;
        $result =  $page->save();

        if ($result) {
            if ($page->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
