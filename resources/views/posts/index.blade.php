@extends('layouts.basic')

@section('title','Users Posts')

@section('content')

<div class="px-6">
    <div class="font-mono text-2xl">
        <p>All Posts Created From Users:</p><br>
    </div>
    
    <ul>
        @foreach($posts as $post)
            <div class="container mx-auto px-6 py-12 md:px-8 bg-orange-600 text-green-500 font-medium text-xl">
                Posted by User: 
                <a href="{{route('users.show',['user' => $post->user, 'post' => $post])}}" class="no-underline hover:underline">
                    @if($post->user->profile == null)
                        <i>{{$post->user->name}}</i><br></a>
                    @else
                        <i>{{$post->user->profile->display_name}}</i></a><br>
                    @endif
                <div class="px-6 py-1">
                    Post Title:
                    <a href="{{ route('posts.show', ['post' => $post->id,'postcomments' => $post->comments])}}" class="no-underline hover:underline"
                        >{{ $post->title }}</a><br>  
                </div>
                Tags:
                <span class="text-teal-300 font-black">
                    @foreach($post->tags as $tag)
                        #{{$tag->name}}
                    @endforeach
                </span>
            </div>   
            <br>
        @endforeach
    </ul> 
 


<button class="shadow-md shadow-green-500 h-10 px-6 font-semibold rounded-md border border-black text-slate-900 bg-white" type="button">
    <a href="{{ route('posts.create')}}">Create a Post</a><br>
</button>

<div class="py-4">
    {{ $posts -> links('pagination::tailwind')}}
</div>

</div>
@endsection