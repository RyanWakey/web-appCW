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
            <span class="text-purple-900 font-extrabold italic underline">
                <a href="{{route('users.show',['user' => $post->user, 'post' => $post])}}">       
                {{$post->user->name}}</a><br>
            </span>
            Title:  {{$post->title}}<br>
            Description: {{$post->description}}<br>
        </ul>
    </div>

    <div class="flex space-x-4 mb-6 text-sm font-medium">
        <div class="flex-auto flex space-x-20 bg-orange-600">
            @if(!Auth::user())
                @else 
                @if(auth()->user()->id == $post->user->id || auth()->user()->admin == true)
                    <button class="h-10 px-6 font-semibold rounded-md border border-black text-slate-900 bg-white" type="button">
                        <a href="{{route('posts.edit', ['post' => $post])}}">Edit Post</a>
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
    
    <div class="font-mono text-2xl font-semibold py-4">
        Comments: <br>
    </div>

    <div class="py-4">
        @if(!Auth::user())
        @else
            @livewire('post-comment',['post' => $post->id])
        @endif
    </div>
    
        <ul>
            @foreach($commentPaginate as $comment)
                <div class="flex-auto px-4 text-base bg-orange-600 text-green-500">
                    User: 
                    <span class="text-purple-900 font-extrabold italic underline">
                        <a href="{{route('users.show',['user' => $post->user, 'post' => $post])}}"> 
                        {{$comment->user->name}}<br></a>
                    </span>
                    Comment:
                    <span class="text-purple-900 font-extrabold underline">
                         <a href="{{route('comments.show', ['post' => $post, 'comment' => $comment])}}"> 
                            {{$comment->description}}<br></a>
                    </span>
                </div> 
                <br>
            @endforeach
        </ul>
       
    <button class="h-10 px-6 font-semibold rounded-md border border-black text-slate-900 bg-white" type="button">
        <a href="{{ route('comments.create', ['post' => $post])}}">Create a Comment</a>
    </button>
    
    <button class="h-10 px-6 font-semibold rounded-md border border-black text-slate-900 bg-white" type="button">
        <a href="{{ route('posts.index')}}">Return</a>
    </button>

</div>

<div class="py-4">
    {{ $commentPaginate -> links('pagination::tailwind')}}
</div>

@endsection