<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts  = Post::paginate(10);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage
     * 
     * @param Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Post::create(array_merge($request->only('title', 'description', 'body'), [
            'user_id'   => Auth::id(),
        ]));

        return redirect()->route('posts.index')->withSuccess(__('Post created successfully'));
    }

    /**
     * Display teh specified resource
     * 
     * @param Post $post
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource
     * 
     * @param Post $post
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage
     * 
     * @param Post $post
     * @param Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post, Request $request)
    {
        $post->update($request->only('description', 'title', 'body'));

        return redirect()->route('posts.index')->withSuccess(__('Post updated successfully'));
    }

    /**
     * Remove the specified resource
     * 
     * @param Post $post
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->withSuccess(__('Post deleted successfully'));
    }
}
