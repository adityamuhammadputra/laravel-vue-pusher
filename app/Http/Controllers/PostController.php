<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Post::create([
            'user_id' => Auth::user()->id,
            'body' => $request->body,
        ]);

        return redirect()->back();
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('post.show', compact('post'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
