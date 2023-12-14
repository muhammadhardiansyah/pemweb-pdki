<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\HelloNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class SigninController extends Controller
{
    public function index(){
        return view('auth.signin');
    }

    public function store(Request $request){
        // dd(request());
        $validatedData = $request->validate([
            'name'      => 'required|max:255',
            'username'  => 'required|min:3|max:255|unique:users',
            'email'     => 'required|email:dns|unique:users',
            'password'  => 'required|min:5|max:255'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']); 

        $user = User::create($validatedData);

        event(new Registered($user));
        
        $newUser = User::find($user->id);
        $newUser->notify(new HelloNotification($newUser));

        return redirect('/login')->with('success', 'Registration successfully! Please Login');
        // return redirect('/verification-notification');
    }
}
