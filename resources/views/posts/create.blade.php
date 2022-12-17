@extends('layouts.basic')

@section('title','New Post')
    
@section('content')
<p> Enter the details below to create a Post</p>
    <form method="POST" action="{{route('posts.store')}}">
        @csrf
        <p>Title: <input type="text" name="title"
            value="{{ old('title')}}"></p>
        <p>Description: <input type="text" name="description"
            value="{{ old('description')}}"></p>
        <input type="submit" value="Submit">    
        <a href="{{route('posts.index')}}">Cancel</a>
    </form>
@endsection