<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index()
    {
        //
        $posts = Post::all();
        return view('index', compact('posts'));
    }


    public function create()
    {
        //
        return view('create');
    }


    public function store(Request $request)
    {
        //
        $post = new Post();
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->content = $request->content;
        $post->save();
        return redirect()->route('index');
    }


    public function show(Post $post)
    {
        //
        return view('show', ['post'=>$post]);
    }


    public function edit(Post $post)
    {
        //
        return view('edit', ['post'=>$post]);
    }


    public function update(Request $request, Post $post)
    {
        //
        $postUpdate = Post::findOrFail($post->id);
        $postUpdate->title = $request->title;
        $postUpdate->subtitle = $request->subtitle;
        $postUpdate->content = $request->content;
        $postUpdate->save();
        return redirect()->route('index');
    }


    public function destroy(Post $post)
    {
        //
        $postDelete = Post::findOrFail($post->id);
        $postDelete->delete();
        return redirect()->route('index');
    }
}
