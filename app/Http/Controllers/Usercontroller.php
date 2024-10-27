<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['users'] = User::all();
        return view('users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,PostRepository $repository)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ],[
            'name.required' => 'Name không hợp lệ',
            'email.required' => 'Email không hợp lệ',
            'password.required' => 'Password không hợp lệ'
        ]);

        $repository->create($request->only([
            'name',
            'email',
            'password'
        ]));
        
        return redirect()->route('user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['cari'] = User::find($id);
        return view('users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, PostRepository $repository)
    {
        $repository->update($request->only([
            'email',
            'password',
            'name',
        ]), $id);
        return redirect()->route('user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, PostRepository $repository)
    {
        $repository->forceDelete($id);
        return redirect()->route('user');
    }
}
