<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Post;
use App\Models\Comment;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        $comments = Comment::get();
        return view('comments.create', ['post' => $post]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'description' => 'required|max:500',
        ]);

        $comment = new Comment;
        $comment->description = $request->description;
        $comment->user_id = auth()->user()->id; 
        $comment->post_id = $request->input('post_id');
        $comment->save();

        return redirect()->route('posts.show' ,['post' => $post]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, Comment $comment)
    {
        return view('comments.show', ['post' => $post, 'comment' => $comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Comment $comment)
    {
        return view('comments.edit', ['post' => $post, 'comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post, Comment $comment)
    {
        $validatedData = $request->validate([
            'description' => 'required|max:500',
        ]);

        $comment->description = $request->description;
        $comment->save();
        session()->flash('message', 'Comment was updated');
        return redirect()->route('posts.show' ,['post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('posts.index')->with('message','Comment was deleted');
    }
}
