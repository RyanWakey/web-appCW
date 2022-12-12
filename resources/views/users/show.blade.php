@extends('layouts.basic')

@section('title','User Posts and Comments')

@section('content')
    
    <p> The posts and comments from User <b>{{$user->name}}:</b></p>
    
    @foreach($user->posts as $post)
        <ul>
            Posts: 
                Created at: {{$post->created_at}}<br>
                title: {{$post->title}}<br>
                description {{$post->description}}<br>
        </ul>
    @endforeach
    
    @foreach($user->comments as $comment)
        <ul>    
            @if(count(user->coments) > 0)
            Comments: 
                Created at: {{$comment->created_at}}
                description {{$comment->description}}
            @else
            {{$user->name}} has made no comments.
        </ul>
    @endforeach

@endsection