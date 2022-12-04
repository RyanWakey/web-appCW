@extends('layouts.basic')

@section('title','Post')

@section('content')
    <ul>
        Post created by User: {{$post->user->username}}<br/>
        Title: {{$post->title}}</li>
        <li>Description {{$post->description}}</li>    
    </ul>
@endsection