@extends('layouts.basic')

@section('title','User Posts and Comments')

@section('content')
    
    <p> The posts and comments from User <b>{{$user->name}}:</b></p>
    Posts:
    @if(count($user->posts) > 0)
        @foreach($posts as $post)
            <ul>
                    Post Created at: {{$post->created_at}}<br>
                    Post title: {{$post->title}}<br>
                    Post description {{$post->description}}<br>
            </ul>
        @endforeach               
    @else
        {{$user->name}} has made no Posts.
    @endif
       
    Comments: <br>
    @if(count($user->comments) > 0)
        @foreach($comments as $comment)
            <ul>    
                Comments: 
                    Comment Created at: {{$comment->created_at}}
                    Comment description {{$comment->description}}
            </ul>
        @endforeach
    @else
        {{$user->name}} has made no Comments.
    @endif
    

@endsection