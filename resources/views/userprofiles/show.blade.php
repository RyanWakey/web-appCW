@extends('layouts.basic')

@section('title','Profile Page')

@section('content')

<div class="px-6 py-4">
    <div class="font-mono text-1xl">
        User Profile:
    </div>
    <div class="flex-auto px-6 py-4 font-semibold bg-red-500 text-black-900 shadow ">
        <i> Display Name - </i>
        <span class="font-black">
            {{$user->profile->display_name}}<br><br>
        </span>
        <i> First Name - </i>
        <span class="font-black">
            {{$user->profile->first_name}}<br><br>
        </span>
        <i> Surname - </i>
        <span class="font-black">
            {{$user->profile->last_name}}<br><br>
        </span>
        <i> Date of Birth - </i>
        <span class="font-black">
            {{$user->profile->date_of_birth}}<br><br>
        </span>
        <i> Bio - </i>
        <span class="font-black">
            {{$user->profile->bio}}<br><br>
        </span>
    
    </div>


</div>

@endsection