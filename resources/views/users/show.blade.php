@extends('layouts.basic')

@section('title','User Posts and Comments')

@section('content')

<div class="font-mono text-1xl py-6 px-4">
    <p>The Posts and Comments from User <b>
        @if($user->profile == null)
            {{$user->name}}:</b></p>
        @else
            {{$user->profile->display_name}}
        @endif
</div>

<div class="px-6">
    @foreach($collection as $pc)
    <div class="bg-orange-600 text-green-500 font-semibold">
        @if($pc->post_id != null)
            Comment Created at - <b>{{$pc->created_at}}<br></b>
            Comment Description - {{$pc->description}}<br> 
        @else
            Post Created at <b> {{$pc->created_at}}<br></b>
            Post Title - {{$pc->title}} <br>
            Post Description - {{$pc->description}}<br>
        @endif
    </div>
    <br>
@endforeach
</div>

<button class="h-10 px-6 mb-4 font-semibold rounded-md border 
border-black text-slate-900 bg-white relative left-2" type="button"> 
<a href="{{url()->previous()}}">Return</a></button>

<div class="px-6">
    {{$collection->links('pagination::tailwind')}}
</div>

@endsection