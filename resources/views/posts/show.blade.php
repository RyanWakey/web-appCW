@extends('layouts.basic')

@section('title','Post')

@section('content')

<div class="flex-auto px-6 py-2 text-lg font-sans">

    <div class="font-mono text-2xl font-semibold py-2">
        Post:
    </div>

    <div class="flex-auto px-4 py-2 text-base bg-orange-600 text-green-500">
        <ul>
            Post created by User: 
            <span class="text-purple-900 text-semibold italic underline">
                <a href="{{route('users.show',['user' => $post->user, 'post' => $post])}}">       
                {{$post->user->name}}</a><br>
            </span>
            Title:  {{$post->title}}<br>
            Description: {{$post->description}}<br><br>
        </ul>
        
        <div class="flex space-x-4 mb-6 text-sm font-medium">
            <div class="flex-auto flex space-x-20">
                @if(!Auth::user())
                @else 
                    @if(auth()->user()->id == $post->user->id || auth()->user()->admin == true)
                        <button class="h-10 px-6 font-semibold rounded-md border border-black text-slate-900 bg-white" type="button">
                            <a href="{{route('posts.edit', ['post' => $post])}}">Edit Post  </a>
                        </button>    
                    @endif
                @endif

                @if(!Auth::user())
                @else 
                    @if(auth()->user()->id == $post->user->id || auth()->user()->admin == true)
                        <form method="POST" action= "{{route('posts.destroy',['post' => $post->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button class="h-10 px-6 font-black rounded-md border border-black text-slate-900 bg-white" 
                        type="submit">Delete Post</button>
                        </form>
                    @endif
                @endif
            </div>
        </div>
    </div>

    <div class="font-mono text-2xl font-semibold py-4">
        Comments: <br>
    </div>

    <div class="flex-auto px-4 py-2 text-base bg-orange-600 text-green-500">
        @foreach($post->comments as $comment)
            <ul>
                User: {{$comment->user->name}} <br>
            <a href="{{route('comments.show', ['post' => $post, 'comment' => $comment])}}"> Comment: </a> {{$comment->description}} <br>
            </ul>  
        @endforeach

        <a href="{{ route('comments.create', ['post' => $post])}}">Create a Comment</a><br><br><br>
    </div>
    <a href="{{ route('posts.index')}}">Return</a><br><br><br>
</div>
@endsection