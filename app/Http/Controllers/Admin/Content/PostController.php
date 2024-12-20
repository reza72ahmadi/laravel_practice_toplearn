<?php

namespace App\Http\Controllers\Admin\Content;

use App\Models\Content\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\PostRequest;
use App\Models\Content\PostCategory;
use League\Flysystem\Visibility;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.content.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $postCategories = PostCategory::all();
        return view('admin.content.post.create', compact('postCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $inputs = $request->all();
        if (isset($request->published_at)) {
            $realTimeStamp = substr($request->published_at, 0, 10);
            $inputs['published_at'] = date("Y-m-d H:i:s", intval($realTimeStamp));
            $inputs['author_id'] = 1;
        }

        Post::create($inputs);
        return redirect()->route('admin.content.post.index')
            ->with('swal-success', ' پست شما با موفقیت ثبت شد');
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
    public function edit(Post $post)
    {
        $postCategories = PostCategory::all();
        return view('admin.content.post.edit', compact('post', 'postCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $inputs = $request->all();
        if (isset($request->published_at)) {
            $realTimeStamp = substr($request->published_at, 0, 10);
            $inputs['published_at'] = date("Y-m-d H:i:s", intval($realTimeStamp));
            $inputs['author_id'] = 1;
        }
        $post->update($inputs);
        return redirect()->route('admin.content.post.index')
            ->with('swal-success', ' پست شما با موفقیت ثبت شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.content.post.index')
            ->with('swal-success', 'پست شما با موفقیت حذف شد');
    }
    // status
    public function status(Post $post)
    {

        $post->status = $post->status == 0 ? 1 : 0;
        $result =  $post->save();

        if ($result) {
            if ($post->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
    // commentable
    public function commentable(Post $post)
    {

        $post->commentable = $post->commentable == 0 ? 1 : 0;
        $result =  $post->save();

        if ($result) {
            if ($post->commentable == 0) {
                return response()->json(['commentable' => true, 'checked' => false]);
            } else {
                return response()->json(['commentable' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['commentable' => false]);
        }
    }
}
