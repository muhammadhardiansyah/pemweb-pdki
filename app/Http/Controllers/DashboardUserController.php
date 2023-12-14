<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index', [
            'active' => 'dash_users',
            'users' => User::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create', [
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
            'image'             => 'required|image|file|max:2048',
            // 'numbers'           => 'required|min:9|max:15',
            'address'           => 'required',
            // 'roles_id'          => 'required',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('user-image');
        }

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/admin/users')->with('success', 'Pengguna baru sudah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', [
            'active' => 'dash_users',
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', [
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
            'address'           => 'required',
            'image'             => 'required|image|file|max:2048',

        ];

        if ($request->email != $user->email) {
            $rules['email'] = 'required|email:dns|unique:users';
        } else {
            $rules['email'] = 'required|email:dns';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($user->image) {
                Storage::delete($user->image);
            }
            $validatedData['image'] = $request->file('image')->store('user-image');
        }

        User::where('id', $user->id)->update($validatedData);

        return redirect('/admin/users')->with('warning', 'Data pengguna berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->image) {
            Storage::delete($user->image);
        }
        User::destroy($user->id);

        return redirect('/admin/users')->with('danger', 'Data pengguna berhasi dihapus!');
    }

    public function security($id)
    {
        return view('users.security', [
            'active' => 'dash_users',
        ]);
    }

    public function changePassword(Request $request)
    {
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with('danger', 'Old password not match with your current password!');
        }
        elseif (!($request->password == $request->re_password)) {
            return back()->with('danger', 'New password and your reinput password not match!');
        }
        else{
            $user = User::find(auth()->user()->id);
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            return back()->with('success', 'Password has been changed');
        }
    }
}
