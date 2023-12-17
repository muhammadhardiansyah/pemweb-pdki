<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\InformationNotification;
use Notification;

class DashboardAdminAnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = DB::table('notifications')->where('type','App\Notifications\InformationNotification')->get();
        return view('admin_announcements.index', [
            'active'=> 'dash_adm_announce',
            'announcements' => $announcements,
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_announcements.create', [
            'active' => 'dash_adm_announce',
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'for'              => 'required|min:3|max:255',
            'notes'           =>  'required',
        ]);

        $notif = new InformationNotification($request->notes);

        if($request->for == 'all')
        {
            $user = User::all();
            Notification::send($user, $notif);
        }
        else {
            $user = User::find($request->for);
            Notification::send($user, $notif);
        }

        return redirect('/admin/adminAnnouncements')->with('success', 'Pengumuman baru sudah ditambahkan!');
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
        return view('admin_announcements.edit', [
            'active' => 'dash_adm_announce',
            'users' => User::all(),
            'announcement' => DB::table('notifications')->find($id)
        ]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'for'              => 'required|min:3|max:255',
            'notes'           =>  'required',
        ]);

        $notif = new InformationNotification($request->notes);

        DB::table('notifications')->where('id', $id)->delete();
        $user = User::find($request->for);
        Notification::send($user, $notif);

        return redirect('/admin/adminAnnouncements')->with('warning', 'Pengumuman sudah diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('notifications')->where('id',$id)->delete();

        return redirect('/admin/adminAnnouncements')->with('danger', 'Pengumuman sudah dihapus!');
    }
}
