@extends('layouts.basic')

@section('title','Comment')

@section('content')

<div class="font-mono text-2xl font-semibold py-2">
    <b>Comment: </b>
</div>

<div class="px-2">
    <div class="px-2 py-2 text-lg bg-orange-600">
        <ul>
            Comment created by User: 
            @if($comment->user->profile == null)  
                {{$comment->user->name}}<br>
            @else
                {{$comment->user->profile->display_name}}<br>
            @endif
            Description: {{$comment->description}}<br>
        </ul>
    </div>

    <div class="flex space-x-4 mb-6 text-sm font-medium">
        <div class="flex-auto flex space-x-20 bg-orange-600">
        @if(!Auth::user())
        @else 
            @if(auth()->user()->id == $comment->user->id || auth()->user()->admin == true)
            <button class="h-10 px-6 font-semibold rounded-md border border-black text-slate-900 bg-white" type="button">
                <a href="{{ route('comments.edit',['post' => $post,'comment' => $comment])}}">Edit Comment</a>
            </button>
            @endif   
        @endif

        @if(!Auth::user())
        @else 
            @if(auth()->user()->id == $comment->user->id || auth()->user()->admin == true)
                <form method="POST" action="{{route('comments.destroy',[ 'post' => $post, 'comment' => $comment->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="h-10 px-6 font-semibold rounded-md border border-black text-slate-900 bg-white" 
                    type="button">Delete Comment
                </button>
                </form>
            @endif
        @endif
    
    </div>

</div>


@endsection