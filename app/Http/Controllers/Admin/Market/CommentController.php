<?php

namespace App\Http\Controllers\Admin\Market;

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
        $unSeenComments = Comment::where('commentable_type', 'App\Models\Market\Product')->where('seen', 0)->get();
        foreach ($unSeenComments as $unSeenComment) {
            $unSeenComment->seen = 1;
            $unSeenComment->save();
        }
        $comments = Comment::where('commentable_type', 'App\Models\Market\Product')->orderBy('created_at', 'desc')->get();
        return view('admin.market.comment.index', compact('comments'));
    }


    public function show(Comment $comment)
    {
        return view('admin.market.comment.show', compact('comment'));
    }

  

    /**
     * Remove the specified resource from storage.
     */
    public function answer (CommentRequest $request, Comment $comment)
    {
        if ($comment->parent == !null) {

            $validatedData = $request->all();
            $validatedData['author_id'] = 1;
            $validatedData['parent_id'] = $comment->id;
            $validatedData['commentable_id'] = $comment->commentable_id;
            $validatedData['commentable_type'] = $comment->commentable_type;
            $validatedData['approved'] = 1;
            $validatedData['status'] = 1;

            Comment::create($validatedData);

            return redirect()->route('admin.market.comment.index')
                ->with('swal-success', 'نظر شما با موفقیت ثبت شد');
        } else {
            return redirect()->route('admin.market.comment.index')
                ->with('swal-success', 'خطا');
        }
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
            return redirect()->route('admin.market.comment.index')
                ->with('swal-success', 'نظر شما با موفقیت تغیر شد');
        } else {
            return redirect()->route('admin.market.comment.index')
                ->with('swal-success', 'تغیر نظر شما باخطا مواجه شد');
        }
    }
}
