<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardAnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('announcements.index', [
            'active'=> 'dash_announce',
            'announcements' => auth()->user()->Notifications,
        ]);
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
    public function show(string $id)
    {
        $announcement = auth()->user()->Notifications->find($id);
        $announcement->markAsRead();
        return view('announcements.show', [
            'active'=> 'dash_announce',
            'announcement' => $announcement,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $announcement = auth()->user()->Notifications->find($id);
        $announcement->delete();

        return redirect('/admin/announcements')->with('danger', 'Pengumuman sudah dihapus!');
    }
}
