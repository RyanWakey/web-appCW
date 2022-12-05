@extends('layouts.basic')

@section('title','New Comment')
    

@section('content')
<p> Comment on this Post:</p>
    <form method="POST" action="{{route('comments.store')}}">
        @csrf
        <p>Description: <input type="text" name="description"
            value="{{ old('description')}}"></p>
        <input type="submit" value="Submit">
        <a href="{{ route('posts.index') }}">Cancel</a>
    </form>
@endsection