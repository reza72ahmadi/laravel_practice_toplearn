<?php

namespace App\Http\Controllers\Admin\Content;

use Illuminate\Http\Request;
use App\Models\Content\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\CommentRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unSeenComments = Comment::where('commentable_type', 'App\Models\Content\Post')->where('seen', 0)->get();
        foreach ($unSeenComments as $unSeenComment) {
            $unSeenComment->seen = 1;
            $unSeenComment->save();
        }
       $comments = Comment::where('commentable_type', 'App\Models\Content\Post')->orderBy('created_at', 'desc')->get();
       return view('admin.content.comment.index', compact('comments'));
    }
 
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.content.comment.show');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function answer(CommentRequest $request, Comment $comment)
    {
        if ($comment->parent == null) {

            $validatedData = $request->all();
            $validatedData['author_id'] = 1;
            $validatedData['parent_id'] = $comment->id;
            $validatedData['commentable_id'] = $comment->commentable_id;
            $validatedData['commentable_type'] = $comment->commentable_type;
            $validatedData['approved'] = 1;
            $validatedData['status'] = 1;

            Comment::create($validatedData);

            return redirect()->route('admin.content.comment.index')
                ->with('swal-success', 'نظر شما با موفقیت ثبت شد');
        } else {
            return redirect()->route('admin.content.comment.index')
                ->with('swal-success', 'خطا');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return view('admin.content.comment.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    // status
    public function status(Comment $comment)
    {

        $comment->status = $comment->status == 0 ? 1 : 0;
        $result =  $comment->save();

        if ($result) {
            if ($comment->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }

    // approved
    public function approved(Comment $comment)
    {

        $comment->approved = $comment->approved == 0 ? 1 : 0;
        $result =  $comment->save();

        if ($result) {
            return redirect()->route('admin.content.comment.index')
                ->with('swal-success', 'نظر شما با موفقیت تغیر شد');
        } else {
            return redirect()->route('admin.content.comment.index')
                ->with('swal-success', 'تغیر نظر شما باخطا مواجه شد');
        }
    }
}
