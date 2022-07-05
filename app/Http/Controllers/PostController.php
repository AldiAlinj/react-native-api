<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return response()->json([
            "status" => 201,
            "data" => $posts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        if ($request->file('image')) {
            $file = $request->file('image');
            $fileName = date('YmHi') . $file->getClientOriginalName();
            $file->storeAs('book-logo/', $fileName);
            $data['image'] = $fileName;
        };


        $newPost = Post::create($data);

        return response()->json([
            "status" => 200,
            "data" => $newPost
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return response()->json([
            'status' => 201,
            'data' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $post)
    {
        $data = $request->validated();
        if ($request->file('image')) {
            $file = $request->file('image');
            $fileName = date('YmHi') . $file->getClientOriginalName();
            $file->storeAs('book-logo/', $fileName);
            $data['image'] = $fileName;
        };

        $post->update($data);

        return response()->json([
            "status" => 200,
            "data" => $post
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json([
            "status" => 200,
            "message" => "Post Deleted Successfully!"
        ]);
    }
}
