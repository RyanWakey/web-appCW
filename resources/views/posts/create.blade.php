@extends('layouts.basic')

@section('title','New Post')
    
@section('content')

<div class="px-4 py-4">
    <div class="bg-red-500">
    
    <div class="font-mono text-2xl py-6 px-4">
        <p> Enter the details below to create a Post: </p>
    </div>  

    <div class="px-6">
        <form method="POST" action="{{route('posts.store')}}">
            @csrf
            <div class="flex-auto space-x-4 mb-6 text-lg font-medium">
                <p>Title: <input type="text" name="title" value="{{ old('title')}}" 
                    style="height:100px;font-size:12pt;width:800px;"></p>
            </div>

            <div class="flex-auto space-x-4 mb-6 text-lg font-medium">
                <p>Description: <input type="text" name="description" value="{{ old('description')}}"
                    style="height:450px;font-size:12pt;width:800px;"></p>
            </div>

            <div class="flex space-x-4 mb-6 text-sm font-medium">
                <div class="flex-auto flex space-x-20">
                    <button class="h-10 px-6 mb-4 font-semibold rounded-md bg-black text-white absolute right-8" 
                    type="submit" value="Submit">Submit
                    <button class="h-10 px-6 mb-4 font-semibold rounded-md border 
                    border-black text-slate-900 bg-white" type="button">    
                    <a href="{{route('posts.index')}}">Canel</a>    
                    </button>
                </div>
            </div>
        </form>  
    </div>

    </div>
</div>

@endsection
