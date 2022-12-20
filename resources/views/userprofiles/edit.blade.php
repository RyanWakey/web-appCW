@extends('layouts.basic')

@section('title','Edit Post')
    
@section('content')

<div class="font-mono text-2xl">
    <p> Edit Profile:</p>
</div>  

<div class="px-6 py-2 bg-red-600">
    <form method="POST" action="{{route('userprofiles.update',['profile' => $profile])}}">
        @csrf
        @method('patch')
        <i> Display Name </i>
            <input type="text" name="display_name" value="{{ old('display_name')}}" 
                style="height:50px;font-size:12pt;width:600px;"></p><br>

            <i> First Name </i>
            <input type="text" name="first_name" value="{{ old('first_name')}}" 
                style="height:50px;font-size:12pt;width:600px;"></p><br>

            <i> Surname </i>
            <input type="text" name="last_name" value="{{ old('last_name')}}" 
                style="height:50px;font-size:12pt;width:600px;"></p><br>

            <i> Date of Birth </i>
            <input type="text" name="date_of_birth" value="{{ old('date_of_birth')}}" 
                style="height:50px;font-size:12pt;width:600px;"></p><br>

            <i> Bio </i>
            <input type="text" name="bio" value="{{ old('bio')}}" 
                style="height:50px;font-size:12pt;width:600px;"></p><br>

            <button class="h-10 px-6 mb-4 font-semibold rounded-md border border-black text-slate-900 bg-white" 
                type="submit">Submit
            </button>

            <button class="h-10 px-6 mb-4 font-semibold rounded-md border border-black text-slate-900 bg-white"> 
                <a href="{{ route('userprofiles.show',['profile' => $profile])}}">Cancel</a>
            </button>
    </form>
</div>

@endsection