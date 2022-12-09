@extends('layouts.basic')

@section('title','Post')

@section('content')
    <ul>
        Post created by User: {{$post->user->username}}<br/>
        Title: {{$post->title}}</li>
        <li>Description {{$post->description}}</li>    
    </ul>
    @foreach($post->comments as $comment)
        <ul>
            Comment:
            {{$comment->description}}
        </ul>  
    @endforeach
    <a href="{{ route('comments.create', ['post' => $post])}}">Create a Comment</a><br><br><br>
    <form method="POST" action="{{route('posts.destroy',['post' => $post->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Post</button>
    </form>
@endsection