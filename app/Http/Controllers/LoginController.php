<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Attempt to authenticate the user
        $credentials = $request->only('email', 'password');

        // Get the user by email
        $user = User::where('email', $request->email)->first();

        // Check if the user exists
        if ($user) {
            // Check if the password needs rehashing
            if (!Hash::needsRehash($user->password)) {
                $password = $user->password;
            } else {
                $password = Hash::make($request->password);
            }

            // Update the user's password
            $user->password = $password;
            $user->save();
        }

        if (Auth::attempt($credentials)) { 
            
            // Authentication successful, redirect to dashboard
            return redirect('/home');
        } else {
            // Authentication failed, redirect back with error message
            return redirect()->back()->withErrors("Invalid login details");

        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/')->with('success', 'Logout successful');
    }
}
