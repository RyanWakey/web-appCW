@extends('layouts.basic')

@section('title','Profile Page')

@section('content')

<div class="px-4 py-4">
    <div class="font-mono text-1xl">
        User Profile:
    </div>
    <i> Display Name </i>
    {{$user->profile->display_name}}<br>
    <i> First Name </i>
    {{$user->profile->first_name}}
    <i> Surname </i>
    {{$user->profile->last_name}}
    <i> Date of Birth </i>
    {{$user->profile->date_of_birth}}
    <i> Bio </i>
    {{$user->profile->bio}}
    
    </div>


</div>

@endsection