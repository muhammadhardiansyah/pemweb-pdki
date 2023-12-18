<?php

namespace App\Http\Controllers;

use App\Models\DailyLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::viaRemember()) {
            return redirect('/admin');
        } else {
            return view('auth.login');
        }
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:255'
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            $dailyLogin = DailyLogin::firstOrCreate(['login_date' => Carbon::today()->toDateString()]);
            $dailyLogin->increment('login_count');  
            return redirect()->intended('/admin');
        }
        return back()->with('loginError', 'The email address or password did not match our records')->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
