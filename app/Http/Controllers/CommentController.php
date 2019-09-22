<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Events\SendComment;
use App\Post;
use Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $comment = New Comment;
        $comment->user_id = auth()->user()->id;
        $comment->content = $request->content;

        $post->comments()->save($comment);

        $comment = Comment::where('id', $comment->id)->with('user')->first();

        broadcast(new SendComment($comment))->toOthers();

        return $comment;
    }

    public function index(Post $post)
    {
        $comment = $post->comments()->with('user')->orderBy('created_at', 'desc')->get();

        return $comment;
    }
}
