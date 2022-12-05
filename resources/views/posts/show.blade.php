@extends('layouts.basic')

@section('title','Post')

@section('content')
    <ul>
        Post created by User: {{$post->user->username}}<br/>
        Title: {{$post->title}}</li>
        <li>Description {{$post->description}}</li>    
    </ul>
    <a href="{{ route('comments.create')}}">Create a Comment</a><br><br><br>
    <form method="POST"
        action="{{route('posts.destroy',['post' => $post->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Post</button>
    </form>
@endsection