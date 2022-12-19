@extends('layouts.basic')

@section('title','New Comment')
    

@section('content')

<div class="px-4 text-slate-900">
    <div class="font-mono text-2xl py-6">
        <p> Comment on this Post:</p>
    </div>

    <div class="px-2 bg-red-600 text-slate-900 font-semibold">
        <form method="POST" action="{{route('comments.store',['post' => $post])}}">
            <div class="flex-auto space-x-4 mb-6 text-lg font-medium">
                <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}" />
                @csrf
                <br><p>Description: <input type="text" name="description"value="{{ old('description')}}" 
                style="height:100px;font-size:12pt;width:1100px;"></p><br>
            </div>
            <div class="flex space-x-4 mb-6 text-sm font-medium">
                <div class="flex-auto flex">
                    <button class="h-10 px-6 font-semibold rounded-md bg-black text-white relative right-0">
                        <input type="submit" value="Submit">
                    </button>
                    <button class="h-10 px-6 font-semibold rounded-md bg-black text-white">
                        <a href="{{ route('posts.show',['post' => $post])}}">Cancel</a>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection