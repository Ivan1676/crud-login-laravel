<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(Request $request){
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make( $request->password ); //generate a token for the password

        $user->save();

        Auth::login($user); //login the user after register

        return redirect()->route('tienda');
    }

    public function login(Request $request){

    }

    public function logout(Request $request){

    }
}