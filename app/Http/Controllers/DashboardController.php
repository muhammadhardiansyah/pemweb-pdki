<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index', [
            'active'    => 'dash',
            'brands'    => Brand::where('user_id', auth()->user()->id)->get(),
        ]);
    }
}
