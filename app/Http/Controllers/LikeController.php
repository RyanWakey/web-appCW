<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Creating and storing a like for a user on a post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function likePost(Request $request,Post $post)
    {

        $like = new Like;
        $like->user_id = auth()->user()->id;
        $like->save();

        $post->likes()->sync($like->id);

        return redirect()->route('posts.show',['post' => $post->id])->with('message','Post was liked');
    }

    public function likeComment(Request $request, Post $post, Comment $comment)
    {
        $like = new Like;
        $like->user_id = auth()->user()->id;
        $like->save();
        
        $post = $comment->post->id;
        $comment->likes()->sync($like->id);

        return redirect()->route('posts.show',['post' => $post])->with('message','Comment was liked');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        //
    }
}
