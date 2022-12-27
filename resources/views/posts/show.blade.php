@extends('layouts.basic')

@section('title','Post')

@section('content')

<div class="flex-auto px-6 py-2 text-lg font-sans font-medium">

    <div class="font-mono text-2xl font-semibold py-2">
        Post:
    </div>

    <div class="flex-auto px-4 py-2 bg-orange-600 text-green-500">
        <ul>
            Post created by User: 
            <span class="text-purple-900 font-extrabold italic underline">
                <a href="{{route('users.show',['user' => $post->user, 'post' => $post])}}">       
                @if($post->user->profile == null)
                    {{$post->user->name}}</a><br><br>
                @else
                    {{$post->user->profile->display_name}}</a><br><br>
                @endif
            </span>
            <span class="">
                @if($post->image != null)
                    Image:
                    <span class="hero container max-w-screen-lg mx-auto pb-1o">
                        <img src="{{ asset('images/'.$post->image)}}" style="height:300px; width:400px;" class="mx-auto">
                    </span>
                </span>
                @endif
            Title:  {{$post->title}}<br><br><br>
            Description: {{$post->description}}<br><br><br>
        </ul>
    </div>

    <div class="mb-6 text-sm font-medium">
        <div class="flex-auto flex space-x-20 bg-orange-600">
            @if(!Auth::user())
                @else 
                @if(auth()->user()->id == $post->user->id || auth()->user()->admin == true)
                    <button class="shadow-md shadow-green-500 h-10 px-6 font-semibold rounded-md border border-black text-slate-900 bg-white" type="button">
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
                    <button class="shadow-xl shadow-red-400 h-10 px-6 font-black rounded-md border border-black text-slate-900 bg-white" 
                        type="submit">Delete Post</button>
                    </form>
                @endif
            @endif

            @if(!Auth::user())
            @else 
                <span class="flex-auto px-2">   
                    <form method="POST" action="{{route('likes.likePost',['post' => $post])}}">
                        @csrf                
                        <button class="h-10 px-6 mb-2 font-black rounded-md border border-black text-slate-900 bg-green-600" 
                        type="submit">Like Post
                        </button>
                    </form>
                </span>
            @endif
        </div>
    </div>
    
    <div class="font-mono text-2xl font-semibold py-4">
        Comments: <br>
    </div>

    @livewire('post-comment',['post' => $post->id])
    
        <ul>
            @foreach($commentPaginate as $comment)
                <div class="container mx-auto px-6 py-12 md:px-8 bg-orange-600 text-green-500">
                    User: 
                    <span class="text-purple-900 font-extrabold italic underline">
                        <a href="{{route('users.show',['user' => $post->user, 'post' => $post])}}"> 
                        @if($comment->user->profile == null)  
                            {{$comment->user->name}}<br></a>
                        @else
                            {{$comment->user->profile->display_name}}<br></a>
                        @endif        
                    </span>
                    Comment:
                    <span class="text-purple-900 font-extrabold underline">
                         <a href="{{route('comments.show', ['post' => $post, 'comment' => $comment])}}"> 
                            {{$comment->description}}<br><br></a>
                    </span>
                    @if(!Auth::user())
                    @else 
                        <form method="POST" action="{{route('likes.likeComment',['comment' => $comment, 'post' => $post])}}">
                            @csrf                
                            <button class="h-10 px-6 mb-2 font-black rounded-md border border-black text-slate-900 bg-green-600" 
                            type="submit"> Like Comment
                            </button>
                        </form>
                    @endif
                </div> 
                <br>
            @endforeach
        </ul>

    {{-- <button class="shadow-md shadow-green-400 h-10 px-6 font-semibold rounded-md border border-black text-slate-900 bg-white" type="button">
        <a href="{{ route('comments.create', ['post' => $post])}}">Create a Comment</a>
    </button> --}}
    
    <button class="shadow-md shadow-red-400 h-10 px-6 font-semibold rounded-md border border-black text-slate-900 bg-white" type="button">
        <a href="{{ route('posts.index')}}">Return</a>
    </button>

</div>

<div class="py-4">
    {{ $commentPaginate -> links('pagination::tailwind')}}
</div>

@endsection