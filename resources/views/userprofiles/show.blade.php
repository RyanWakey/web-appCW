@extends('layouts.basic')

@section('title','Profile Page')

@section('content')

<div class="px-6 py-4 text-2xl">
    <div class="font-mono text-1xl">
        User Profile:
    </div>
    
    <div class="container mx-auto px-6 py-12 md:px-8 bg-red-500 text-green-500 shadow">
        <i> Display Name - </i>
        <span class="font-black">
            {{$profile->display_name}}<br><br>
        </span>
        <i> First Name - </i>
        <span class="font-black">
            {{$profile->first_name}}<br><br>
        </span>
        <i> Surname - </i>
        <span class="font-black">
            {{$profile->last_name}}<br><br>
        </span>
        <i> Date of Birth - </i>
        <span class="font-black">
            {{$profile->date_of_birth}}<br><br>
        </span>
        <i> Bio - </i>
        <span class="font-black">
            {{$profile->bio}}<br><br>
        </span>
        <button class="h-10 px-6 font-semibold rounded-md border border-black text-slate-900 bg-white" 
            type="button">    
            <a href="{{route('posts.index')}}">Return</a>    
        </button>
        <button class="h-10 px-6 font-semibold rounded-md border border-black text-slate-900 bg-white" 
            type="button">    
            <a href="{{route('userprofiles.edit', ['profile' => $profile])}}">Edit Profile</a>    
        </button>
        <button class="h-10 px-6 font-semibold rounded-md border border-black text-slate-900 bg-white"
            type="button">
            <a href="{{route('profile.edit',['user' => auth()->user()])}}">Change Account Details</a>    
        </button>
    </div>


</div>

@endsection