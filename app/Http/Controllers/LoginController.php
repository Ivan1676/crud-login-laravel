<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        try {
            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            
            $user->save();

            Auth::login($user); // Login the user after register

            return redirect()->route('store'); // Redirect to the "store" route after registration
        } catch (QueryException $e) {
            // Check if the exception is due to a duplicate entry (email already exists)
            if ($e->getCode() === '23000') {
                // Email already exists, show an error message to the user
                return redirect()->back()->withInput()->withErrors(['email' => 'The email already exists.']);
            }
        }
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) { //check if the user exists
            $request->session()->regenerate();

            return redirect()->route('store');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}