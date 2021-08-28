<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GeneralController extends Controller
{
    //

    public function register(RegisterRequest $request) {
        
        //role => 1.teacher 2.student
        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => 2,
            'password' => Hash::make($request->password),
        ];
        $user = User::create($data);
        if($user)
            return redirect('register')->with('success', 'Registered Successully!');
        else
            return redirect('register')->with('not_success', 'Registration cannot be done. Please try later!');
    }

    public function login(LoginRequest $request) {
        $user = User::where('username', $request->username)->first();
        Auth::login($user);
        return redirect('homepage')->with('role', $user->role);
        // if($user->role == 1)
        //     return redirect('homepage');
        // elseif($user->role == 2)
        //     return redirect('homepage');
    }
}
