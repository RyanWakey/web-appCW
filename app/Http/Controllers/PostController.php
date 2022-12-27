<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Tag;
use App\Models\Post;
use App\Http\Controllers\Controller;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user')->get()->paginate(15);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $tags = Tag::get();
        return view('posts.create', ['tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:150',
            'description' => 'required|max:500',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $imageName;
        $post->user_id = auth()->user()->id; 
        $post->save();
        
        $commentPaginate = $post->comments->paginate(10);
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.show', ['post' => $post, 'commentPaginate' => $commentPaginate])
            ->with('message', 'Post was Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {   
        $commentPaginate = $post->comments->paginate(10);
        return view('posts.show', ['post' => $post, 'commentPaginate' => $commentPaginate]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::get();
        return view('posts.edit', ['post' => $post,'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:150',
            'description' => 'required|max:500',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $imageName;
        $post->save();

        $post->tags()->sync($request->tags);
        
        return redirect()->route('posts.show', ['post' => $post])->with('message', 'Post was Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {   
        $post->delete();
        return redirect()->route('posts.index')->with('message','Post was deleted');
    }
}

