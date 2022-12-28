@extends('layouts.basic')

@section('title','Edit Comment')
    
@section('content')

<div class="px-2">

    <div class="font-mono text-2xl font-semibold py-2">
        <p> Edit Comment:</p>
    </div>

    <div class="container mx-auto px-6 py-12 md:px-8 bg-orange-600 text-green-500">
        <div class="flex space-x-4 mb-6 text-sm font-medium">
            <div class="flex-auto flex space-x-20 bg-orange-600">
                <form method="POST" action="{{route('comments.update',['post' => $post, 'comment' => $comment])}}">
                @csrf
                @method('patch')
                <br>
                <p>Description: <input type="text" name="description" value="{{ old('description')}}"  
                style="height:200px;font-size:12pt;width:1100px"></p><br>
                <button type="submit" class="shadow-md shadow-green-500 h-10 px-6 font-semibold rounded-md border border-black text-slate-900 bg-white">
                    Edit Comment
                </button> 
                <button type="submit" class="shadow-md shadow-green-500 h-10 px-6 font-semibold rounded-md border border-black text-slate-900 bg-white">
                    <a href="{{ route('posts.show',['post' => $post])}}">Cancel</a>
                </button>
                </form>
            </div> 
        </div>
    </div>

</div>
@endsection
