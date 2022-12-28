@extends('layouts.basic')

@section('title','Profile Page')

@section('content')

<div class="px-4 py-4">

    <div class="font-mono text-1xl">
        Create Your Profile:
    </div>
    <div class="container mx-auto px-6 py-12 md:px-8 bg-red-600 text-green-500">
        <form method="POST" action="{{route('userprofiles.store')}}">
            @csrf
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

            <div class="flex space-x-4 mb-2 text-sm font-medium">
                <div class="flex-auto flex space-x-20">
                    <button class="shadow-md shadow-green-500 h-10 px-6 font-semibold rounded-md bg-black text-white" 
                        type="submit" value="Submit">Submit
                    </button>
                    <button class="shadow-md shadow-green-500 h-10 px-6 font-semibold rounded-md border border-black text-slate-900 bg-white" 
                        type="button">    
                            <a href="{{url()->previous()}}">Cancel</a>    
                    </button>
        </form>
    </div>
    


</div>

@endsection