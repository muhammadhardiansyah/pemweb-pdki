<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\DailyLogin;
use App\Models\User;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index()
    {

        if (auth()->user()->hasRole('admin')) 
        {
            return view('dashboard.index', [
                'active'    => 'dash',
                'brands'    => Brand::latest(),
                'approvedBrands'=> Brand::latest()->where('decision', 1)->take(3)->get(),
                'recentBrands' => Brand::latest()->take(4)->get(),
                'daily'     => DailyLogin::latest()->get(),
                'users'     => User::all(),
                'countUser' => User::role('user')->count(),
                'countAdmin' => User::role('admin')->count(),
                'brandsToday' => Brand::whereDate('created_at', Carbon::today())->count(),
                'brandsMonth' => Brand::whereMonth('created_at', Carbon::now()->month)->count(),
                'brandsYear' => Brand::whereYear('created_at', Carbon::now()->year)->count(),
                'dailyToday' => DailyLogin::whereDate('login_date', Carbon::today())->sum('login_count'),
                'dailyMonth' => DailyLogin::whereMonth('login_date', Carbon::now()->month)->sum('login_count'),
                'dailyYear' => DailyLogin::whereYear('login_date', Carbon::now()->year)->sum('login_count'),
                'brands_reject' => Brand::where('decision', 0)->count(),
                'brands_accept' => Brand::where('decision', 1)->count(),
                'brands_none' => Brand::where('decision', 2)->count(),
                'brands_revise' => Brand::where('decision', 3)->count(),
            ]);
        }
        else 
        {
            return view('accounts.show', [
                'active' => 'dash',
                'user' => User::find(auth()->user()->id),
            ]);
        }
    }
}
