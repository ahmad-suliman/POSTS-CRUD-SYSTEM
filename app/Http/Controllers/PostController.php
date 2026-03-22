<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|max:50',
            'title' => 'required|string|max:100',
            'message' => 'required|string'
        ]);
        Post::create([
            'username' => $request->username,
            'title' => $request->title,
            'message' => $request->message,
        ]);
        return redirect()->route('posts.index')->with('create', 'post added successfuly');
    }
    public function show($post_id)
    {
        $post = Post::findOrFail($post_id)->first();
        return view('posts.show', ['post' => $post]);
    }
    public function edit($post_id)
    {
        $post = Post::findOrFail($post_id)->first();
        return view('posts.edit', ['post' => $post]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|max:50',
            'title' => 'required|string|max:100',
            'message' => 'required|string'
        ]);

        $currentPost = Post::findOrFail($request->post_id);
        $currentPost->username = $request->username;
        $currentPost->title = $request->title;
        $currentPost->message = $request->message;
        $currentPost->save();
        return redirect()->route('posts.index')->with('update', 'post update successfuly');
    }
    public function destroy($post_id)
    {
        $post = Post::findOrFail($post_id)->delete();
        return back()->with('delete', 'post successfuly deleted');
    }
}
