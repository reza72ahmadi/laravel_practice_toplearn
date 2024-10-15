<?php

namespace App\Http\Controllers\Admin\Content;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Content\PostCategory;
use App\Http\Requests\Admin\Content\PostCategoryRequest;

class CategoryController extends Controller
{
    // index
    public function index()
    {
        $postCategories = PostCategory::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.content.category.index', compact('postCategories'));
    }

    // create
    public function create()
    {
        return view('admin.content.category.create');
    }

    // store
    public function store(PostCategoryRequest $request)
    {
        $inputs =  $request->all();
        $inputs['image'] = 'image';
        PostCategory::create($inputs);
        return redirect()->route('admin.content.category.index')
            ->with('swal-success', 'دسته بندی جدید شما با موفقیت ساخته شد');
    }

    // show
    public function show()
    {
        return view('admin.content.comment.show');
    }

    // edit
    public function edit(PostCategory $postCategory)
    {
        return view('admin.content.category.edit', compact('postCategory'));
    }

    // update
    public function update(PostCategoryRequest $request, PostCategory $postCategory)
    {
        $inputs =  $request->all();
        $inputs['image'] = 'image';
        $postCategory->update($inputs);
        return redirect()->route('admin.content.category.index');
    }


    // destroy
    public function destroy(PostCategory $postCategory)
    {
        $postCategory->delete();
        return redirect()->route('admin.content.category.index')
            ->with('swal-success', 'دسته بندی شما با موفقیت حذف شد');
    }

    // status
    public function status(PostCategory $postCategory)
    {

        $postCategory->status = $postCategory->status == 0 ? 1 : 0;
        $result =  $postCategory->save();

        if ($result) {
            if ($postCategory->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
