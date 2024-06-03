<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::where('userType', 'user')
            ->orderBy('created_at', 'desc')
            ->get();


        return view('admin.index', ['admins' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Role $roles)
    {
        return view('admin.create', ['roles' => $roles->all()]);
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
            'img'  => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/images', $filename);
        }


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'userType' => $request->role_id == 2 || $request->role_id == null ? 'user' : 'admin',
            'role_id' => $request->role_id == 2 || $request->role_id == null ? 2 : $request->role_id,
            'img_path' => $path,
        ]);

        return redirect()->route('admin.index')->with('success', 'User added sucessfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(User $admin)
    {
        return view('admin.show', ['user' => $admin]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $admin, Role $roles)
    {

        return view('admin.edit', ['admin' => $admin, 'roles' => $roles->all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $admin, Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
            'img'  => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/images', $filename);
        }


        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'userType' => $request->role_id == 1 ?  'admin' : 'user',
            'img_path' => $path,
            'password' => Hash::make($request->password),

        ]);

        $admin->role_id = $request->role_id;
        $admin->save();


        return redirect()->route('admin.index')->with('success', 'User updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin)
    {
        $admin->delete();

        return redirect()->route('admin.index')->with('success', 'User deleted successfully');
    }
}
