@extends('layouts.basic')

@section('title','User Posts and Comments')

@section('content')
    
    <p> The posts and comments from User <b>{{$user->name}}:</b></p>
    
    @foreach($user->posts as $post)
        <ul>
            @if(count($user->posts) > 0)
                Posts: 
                    Created at: {{$post->created_at}}<br>
                    title: {{$post->title}}<br>
                    description {{$post->description}}<br>
            @else
                {{$user->name}} has made no posts.
            @endif
        </ul>
    @endforeach
    
    @foreach($user->comments as $comment)
        <ul>    
            @if(count($user->comments) > 0)
                Comments: 
                    Created at: {{$comment->created_at}}
                    description {{$comment->description}}
            @else
                {{$user->name}} has made no comments.
            @endif
        </ul>
    @endforeach

@endsection