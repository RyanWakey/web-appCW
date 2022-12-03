@extends('layouts.basic')

@section('title','Posts Index')

@section('content')
    <p> The posts from the users:</p>
    <ul>
        @foreach($posts as $post)
            <li><a href='{{ route('posts.show', ['id' => $post->id]) }}'>{{ $post ->title }}</a></li>
        @endforeach
    </ul>
   {{ $posts -> links('pagination::tailwind')}}
@endsection