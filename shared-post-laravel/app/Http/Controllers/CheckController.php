<?php

namespace App\Http\Controllers;

use App\Models\SharePost;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('check.index', ['checks' => SharePost::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('check.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
            'user_id' => 'required',
        ]);

        $post = SharePost::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('checks.index')->with('success', 'Post Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(SharePost $check)
    {
        return view('check.show', ['check' => $check]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SharePost $check)
    {
        return view('check.edit', ['check' => $check]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SharePost $check, Request $request)
    {


        $check->update($request->validate([
            'title' => 'required',
            'content' => 'required',

        ]));

        return redirect()->route('checks.index')->with('success', 'Post updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SharePost $check)
    {
        $check->delete();

        return redirect()->route('checks.index')->with('success', 'Post deleted successfully');
    }
}
