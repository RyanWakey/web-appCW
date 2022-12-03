@extends(layouts.basic)

@section('title','New Post')
    <p> Create a post below</p>

@section('content')
    <form method="POST" action="{{route('post.store')}}">
        @csrf
        <p>title: <input type="text" name="Post Title"></p>
        <p>description: <input type="text" name="Description"></p>
        <input type="submit" value="Submit">
        <a href="{{route('post.index') }}">Cancel</a>

    </form>
@endsection