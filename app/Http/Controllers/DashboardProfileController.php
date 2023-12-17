<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DashboardProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('accounts.show', [
            'active' => 'dash_users',
            'user' => User::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('accounts.edit', [
            'active' => 'dash_users',
            'user' => User::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $rules = [
            'name'              => 'required|min:3|max:255',
            'username'          => 'required|min:3|max:255',
            'address'           => 'required',
            'image'             => 'image|file|max:2048',

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

        return redirect('/admin/profiles/'.$id)->with('warning', 'Data pengguna berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->image) {
            Storage::delete($user->image);
        }
        User::destroy($user->id);

        return redirect('/admin')->with('danger', 'Data pengguna berhasi dihapus!');
    }

    public function security($id)
    {
        return view('accounts.security', [
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
