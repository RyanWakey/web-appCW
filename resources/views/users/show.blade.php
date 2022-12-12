@extends('layouts.basic')

@section('title','User Posts and Comments')

@section('content')

<p> The Posts and Comments from User <b>{{$user->name}}:</b></p>

@foreach($collection as $pc)
        @if($pc->post_id != null)
            Comment Created at {{$pc->created_at}} <br>
            Comment Description {{$pc->description}} <br> <br>  
        @else
            Post Created at {{$pc->created_at}} <br>
            Post Title: {{$pc->title}} <br>
            Post Description: {{$pc->description}} <br> <br>
        @endif
@endforeach

{{$collection->links('pagination::tailwind')}}
    

@endsection