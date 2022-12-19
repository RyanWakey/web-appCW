@extends('layouts.basic')

@section('title','Edit Post')
    
@section('content')

<div class="font-mono text-2xl">
    <p> Edit Post:</p>
</div>  

<div class="px-6 py-2 bg-red-600">
        @if(!Auth::user())
        @else 
        @if(auth()->user()->id == $post->user->id || auth()->user()->admin == true)
            <form method="POST" action="{{route('posts.update',['post' => $post])}}">
                @csrf
                @method('patch')
                <div class="flex-auto space-x-4 mb-6 text-lg font-medium">
                    <p>Title:    <input type="text" name="title" value="{{ old('title')}}"
                        style="height:200px;font-size:12pt;width:1100px"></p>
                </div>
                <div class="space-x-4 py-4 text-lg font-medium">    
                    <p>Description: <input type="text" name="description" value="{{ old('description')}}"" 
                        style="height:420px;font-size:12pt;width:1100px"></p><br>
                <div>
               
                <button class="h-10 px-6 mb-4 font-semibold rounded-md border border-black text-slate-900 bg-white" 
                    type="submit">Edit Post
                </button>

                <button class="h-10 px-6 mb-4 font-semibold rounded-md border border-black text-slate-900 bg-white"> 
                    <a href="{{ route('posts.show',['post' => $post])}}">Cancel</a>
                </button>
            </form> 
        @endif
    @endif
</div>

@endsection
