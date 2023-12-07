<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index', [
            'active'=> 'dash_users',
            'users' => User::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create',[
            'active' => 'dash_users'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'              => 'required|min:3|max:255',
            'username'          => 'required|min:3|max:255',
            'email'             => 'required|email:dns|unique:users',
            'password'          => 'required|min:5|max:255',
            // 'numbers'           => 'required|min:9|max:15',
            // 'address'           => 'required',
            // 'roles_id'          => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']); 

        User::create($validatedData);

        return redirect('/admin/users')->with('success', 'Pengguna baru sudah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit',[
            'active' => 'dash_users',
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name'              => 'required|min:3|max:255',
            'username'          => 'required|min:3|max:255',
        ];

        if ($request->email != $user->email){
            $rules['email'] = 'required|email:dns|unique:users';
        }
        else{
            $rules['email'] = 'required|email:dns';
        }

        $validatedData= $request->validate($rules);

        User::where('id', $user->id)->update($validatedData);

        return redirect('/admin/users')->with('warning', 'Data pengguna berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect('/admin/users')->with('danger', 'Data pengguna berhasi dihapus!');
    }
}
