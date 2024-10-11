<?php

namespace App\Http\Controllers\Admin\Content;

use App\Models\Content\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\FaqRequest;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $faqs = Faq::all();
        return view('admin.content.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.content.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqRequest $request)
    {

        $inputs = $request->all();
        Faq::create($inputs);
        return redirect()->route('admin.content.faq.index')
            ->with('swal-success', 'سوال شما با موفقیت ذخیره شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        return view('admin.content.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FaqRequest $request, Faq $faq)
    {
        $inputs = $request->all();
        $faq->update($inputs);
        return redirect()->route('admin.content.faq.index')
            ->with('swal-success', 'سوال شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.content.faq.index')
            ->with('swal-success', 'سوال شما با موفقیت حذف شد');
    }
    // status
    public function status(Faq $faq)
    {

        $faq->status = $faq->status == 0 ? 1 : 0;
        $result =  $faq->save();

        if ($result) {
            if ($faq->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
