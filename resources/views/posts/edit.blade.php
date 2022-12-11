@extends('layouts.basic')

@section('title','Edit Post')
    
@section('content')

<p> Edit Comment:</p>
    <form method="POST" action="{{route('posts.update',['post' => $post])}}">
        @csrf
        @method('patch')
        <p>title: <input type="text" name="title" value="{{ old('title')}}"></p>
        <p>description: <input type="text" name="description" value="{{ old('description')}}"></p>
        <button type="submit">Edit Comment</button> 
        <a href="{{ route('posts.show',['post' => $post])}}">Cancel</a>
    </form> 
@endsection
