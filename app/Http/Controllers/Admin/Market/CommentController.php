<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Models\Content\Comment;
use App\Http\Controllers\Controller;

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

   
    public function show()
    {
        return view('admin.market.comment.show');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

  
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
}
