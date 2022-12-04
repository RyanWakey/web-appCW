@extends('layouts.basic')

@section('title','User Posts')

@section('content')
    <p> The posts from the users:</p>
    <ul>
        @foreach($posts as $post)
            <li><a href='{{ route('posts.show', ['post' => $post->id]) }}'>{{ $post ->title }}</a></li><br>
        @endforeach
    </ul>
    <a href="{{ route('posts.create')}}">Create a Post</a><br><br><br>
    
   {{ $posts -> links('pagination::tailwind')}}
@endsection