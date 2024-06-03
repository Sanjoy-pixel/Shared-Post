<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthSignupController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    /**
     * Show the form for creating a new resource.
     */
    public function create(Role $roles)
    {
        return view('authsignup.create', ['roles' => $roles->all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'userType' => $request->role_id == 2 || $request->role_id == null ? 'user' : 'admin',
            'role_id' => $request->role_id == 2 || $request->role_id == null ? 2 : $request->role_id,
        ]);

        return redirect()->route('auth.create')->with('success', 'Sign up successful. Please log in.');
    }




    public function destroy(string $id)
    {
        //
    }
}
