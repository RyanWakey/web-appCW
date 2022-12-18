@extends('layouts.basic')

@section('title','Users Posts')

@section('content')

<div class="px-6">
    <div class="font-mono text-2xl">
        <p>All Posts Created From Users:</p><br>
    </div>

        <div class="px-6">
        <ul>
            @foreach($posts as $post)
                <div class="bg-orange-600 text-green-500 font-semibold">
                    Posted by User: <a href="{{route('users.show',['user' => $post->user, 'post' => $post])}}">
                        <u><i>{{$post->user->name}}</i></u><br>
                    <div class="px-6 py-1">
                        Post Title:
                        <u><a href='{{ route('posts.show', ['post' => $post->id,'postcomments' 
                        => $post->comments]) }}'>{{ $post->title }}</u></a><br>  
                    </div>
                </div>   
                <br>
            @endforeach
        </ul> 
    </div>


<button class="h-10 px-6 font-semibold rounded-md border border-black text-slate-900 bg-white" type="button">
    <a href="{{ route('posts.create')}}">Create a Post</a><br>
</button>

<div class="py-4">
    {{ $posts -> links('pagination::tailwind')}}
</div>

</div>
@endsection