<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\{Banner, Properti, Testimoni, User};
use App\Models\Articles;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('components.pages.Login', [
            'title' => 'Signin-Signup | Puncak Permata Batu'
        ]);
    }

    public function dashboard()
    {
        $total_rating_users = Testimoni::whereNotNull('rating')->count();
        $average_rating = Testimoni::whereNotNull('rating')->avg('rating');

        return view('components.pages.Dashboard', [
            'title' => 'Beranda',
            'total_users' => User::count(),
            'total_banners' => Banner::count(),
            'total_articles' => Articles::count(),
            'total_testimoni' => Testimoni::count(),
            'total_rating_users' => $total_rating_users,
            'average_rating' => number_format($average_rating, 1),
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

        $login_type = filter_var($credentials['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        if (Auth::attempt([$login_type => $credentials['login'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'login' => 'Login gagal, periksa kembali email/nama dan kata sandi Anda.'
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
