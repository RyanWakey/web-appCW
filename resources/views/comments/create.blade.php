@extends('layouts.basic')

@section('title','New Comment')
    

@section('content')
<p> Comment on this Post:</p>
    <form method="POST" action="{{route('comments.store',['post' => $post])}}">
        <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}" />
        @csrf
        <p>Description: <input type="text" name="description"
            value="{{ old('description')}}"></p>
        <input type="submit" value="Submit">
        <a href="{{ route('posts.show',['post' => $post])}}">Cancel</a>
    </form>
@endsection