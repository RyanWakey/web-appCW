@extends('layouts.basic')

@section('title','Post')

@section('content')
<b>Post: </b>
    <ul>
        Post created by User: {{$post->user->name}}<br>
        Title: {{$post->title}}<br>
        Description: {{$post->description}}<br>
    </ul>
    <b>Comments: </b><br>
    @foreach($post->comments as $comment)
        <ul>
            User: {{$comment->user->name}} <br>
        <a href="{{route('comments.show', ['post' => $post, 'comment' => $comment])}}"> Comment: </a> {{$comment->description}} <br>
        </ul>  
    @endforeach
    <a href="{{ route('comments.create', ['post' => $post])}}">Create a Comment</a><br><br><br>
    @if(!Auth::user())
    @else 
        @if(auth()->user()->id == $post->user->id)
            <form method="POST" action="{{route('posts.destroy',['post' => $post->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete Post</button>
            </form>
        @endif
    @endif
@endsection