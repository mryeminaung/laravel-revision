<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add(Request $request)
    {
        Comment::create([
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            // 'user_id' => rand(1, 10),
            'article_id' => $request->article_id
        ]);
        return back();
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
