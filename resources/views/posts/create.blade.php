@extends('layouts.basic')

@section('title','New Post')
    
@section('content')

    <div class="font-mono text-2xl py-6 px-4">
        <p> Enter the details below to create a Post: </p>
    </div>  

    <div class="container mx-auto px-8 py-12 md:px-8 bg-red-600 text-green-500 font-medium text-lg">
        <div class="px-6">
        <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="flex-auto space-x-4 mb-6 text-lg font-medium">
                <p> Image: <input type="file" class="form-control" name="image" value="{{old('image')}}"></p>
            </div>

            <div class="flex-auto space-x-4 mb-6 text-lg font-medium">
                <p>Title:    <input type="text" name="title" value="{{ old('title')}}" 
                    style="height:100px;font-size:12pt;width:1100px;"></p>
            </div>

            <div class="flex-auto space-x-4 mb-6 text-lg font-medium">
                <p>Description: <input type="text" name="description" value="{{ old('description')}}"
                    style="height:450px;font-size:12pt;width:1100px;"></p>
            </div>
            
            <div class="flex-auto space-x-2 mb-6 text-lg font-medium">
                <p>Select relevant tags: <select id="tags" name="tags[]" class="bg-gray-100 border border-gray-900 text-gray-900
                    text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-500" multiple>
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex space-x-4 py-2 mb-6 text-sm font-medium">
                <div class="flex-auto flex space-x-20">

                    <button class="shadow-md shadow-green-500 h-10 px-6 mb-4 font-semibold rounded-md bg-black text-white" 
                    type="submit" value="Submit">Submit
                    </button>

                    <button class="h-10 px-6 mb-4 font-semibold rounded-md border border-black text-slate-900 bg-white" 
                    type="button">    
                        <a href="{{route('posts.index')}}">Cancel</a>    
                    </button>
                </div>
            </div>
        </form>  
        
    </div>
</div>

@endsection
