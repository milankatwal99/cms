<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Http\Requests\updateUserProfileRequest;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index')->with('users',User::all());
    }

    public function change($id)
    {
        $output= User::findOrFail($id);
        $output->role='admin';
        $output->save();

    }

    public function editprofile()
    {
        return view('users.profile')->with('user',auth()->user());
    }

    public function updateprofile(UpdateUserProfileRequest $request)
    {
        $user=auth()->user();
        $user->update([
            'name'=>$request->name,
            'about'=>$request->description,
        ]);
        return redirect(route('user.index'));
    }
}
