<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class PostController extends Controller
{
    public function myPosts()
    {
        return view('my-posts');
    }

    /**
     * Display a listing of the resource.
     *
     * 
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     
     */
    public function store(Request $request)
    {
        $post = Post::create($request->all());
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     *
     
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id)->update($request->all());
        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     *
    
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return response()->json(['done']);
    }
}
