@extends('layouts.basic')

@section('title','Edit Comment')
    
@section('content')

<p> Edit Comment:</p>
    <form method="POST" action="{{route('comments.update',['post' => $post, 'comment' => $comment])}}">
        @csrf
        @method('patch')
        <p>Description: <input type="text" name="description" value="{{ old('description')}}"></p>
        <button type="submit">Edit Comment</button> 
        <a href="{{ route('posts.show',['post' => $post])}}">Cancel</a>
    </form> 
@endsection
