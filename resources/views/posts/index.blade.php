@extends('layouts.basic')

@section('title','Posts Index')

@section('content')
    <p> The posts from the users:</p>
    <ul>
        @foreach($posts as $post)
            <li>{{ $post ->title }} </li>
        @endforeach
    </ul>

@endsection