<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function redirectTo()
    {
        // Change this to your desired default redirect path
        return '/admin';
    }

    /**
     * Display a listing of the resource.
     */


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only(['email', 'password']);
        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember) && Auth::user()->userType == 'admin') {

            return redirect()->route('admin.index');
            // if (Auth::check()) {

            // if (Auth::user()->userType == 'admin') {

            //     return redirect()->intended('/');
            // User is an admin
            // You can redirect to the admin dashboard or perform other admin-specific actions
            // } elseif (Auth::user()->userType == 'user') {

            //     return redirect()->intended('/');
            // User is not an admin
            // You can redirect to the user dashboard or perform other user-specific actions
            //     }
            // } else {
            //     return redirect()->back()->with('error', 'Invalid Credentials');
            // }


        } elseif (Auth::attempt($credentials, $remember) && Auth::user()->userType == 'user') {
            return redirect()->route('checks.index');
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('login');
    }
}
