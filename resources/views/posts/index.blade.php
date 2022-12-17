@extends('layouts.basic')

@section('title','User Posts')

@section('content')

<div class="adsad">
        <p> The posts from the Users:</p>
        <ul>
            @foreach($posts as $post)
                <li> Posted by: {{$post->user->name}} </li>
                <a href='{{ route('posts.show', ['post' => $post->id]) }}'>{{ $post->title }}</a><br><br>
            @endforeach
        </ul>
    </div> 
    <a href="{{ route('posts.create')}}">Create a Post</a><br><br><br>

   {{ $posts -> links('pagination::tailwind')}}

@endsection