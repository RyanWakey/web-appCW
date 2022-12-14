@extends('layouts.basic')

@section('title','Comment')

@section('content')
<b>Comment: </b>
    <ul>
        Comment created by User: {{$comment->user->name}}<br>
        Description: {{$comment->description}}<br>
    </ul>
    @if(!Auth::user())
    @else 
        @if(auth()->user()->id == $comment->user->id || auth()->user()->admin == true)
            <a href="{{ route('comments.edit',['post' => $post,'comment' => $comment])}}">Edit Comment</a>
        @endif   
    @endif
    @if(!Auth::user())
    @else 
        @if(auth()->user()->id == $comment->user->id || auth()->user()->admin == true)
            <form method="POST" action="{{route('comments.destroy',[ 'post' => $post, 'comment' => $comment->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete Comment</button>
            </form>
        @endif
    @endif
@endsection