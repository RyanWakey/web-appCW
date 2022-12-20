<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userprofiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'display_name' => 'required|max:60',
            'first_name' => 'nullable|max:100',
            'last_name' => 'nullable|max:100', 
            'date_of_birth' => 'nullable|date', 
            'bio' => 'nullable|max:1000',  
        ]);

        $profile = new Profile;
        $profile->display_name = $request->display_name;
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->date_of_birth = $request->date_of_birth;
        $profile->bio = $request->bio;
        $profile->user_id = auth()->user()->id;
        $profile->save();

        return view('userprofiles.show', ['profile' => $profile]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return view('userprofiles.show', ['profile' => $profile]);
    }

    /**
     * Show the form for editing the specified resource.    
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('userprofiles.edit',['profile' => $profile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $validatedData = $request->validate([
            'display_name' => 'required|max:60',
            'first_name' => 'nullable|max:100',
            'last_name' => 'nullable|max:100', 
            'date_of_birth' => 'nullable|date', 
            'bio' => 'nullable|max:1000',  
        ]);

        $profile->display_name = $request->display_name;
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->date_of_birth = $request->date_of_birth;
        $profile->bio = $request->bio;
        $profile->user_id = auth()->user()->id;
        $profile->save();
        
        return redirect()->route('userprofiles.show', ['profile' => $profile])->with('message', 'Profile was Updated');
    }

}
