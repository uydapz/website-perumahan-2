<?php

namespace App\Http\Controllers;

use App\Models\{Banner, Testimoni, Visitor};
use App\Models\Articles;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $ip = $request->ip();
        $agent = $request->userAgent();

        // Cek apakah IP sudah tercatat hari ini
        $sudah = Visitor::where('ip_address', $ip)
            ->whereDate('created_at', now()->toDateString())
            ->exists();

        if (!$sudah) {
            Visitor::create([
                'ip_address' => $ip,
                'user_agent' => $agent,
            ]);
        }

        $totalVisitors = Visitor::count();
        $banner = Banner::latest()->get();
        $articles = Articles::latest()->get();
        $testimoni = Testimoni::latest()->get();
        return view('components.pages.Home', [
            'title' => 'Beranda',
            'banner' => $banner,
            'articles' => $articles,
            'testimoni' => $testimoni,
            'totalVisitors' => $totalVisitors
        ]);
    }

    public function about(Request $request)
    {
        $banner = Banner::latest()->get();


        return view('components.pages.About', [
            'title' => 'About Us',
            'banner' => $banner,
        ]);
    }

    public function blog(Request $request)
    {
        $query = Articles::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('deskripsi', 'like', "%{$search}%");
        }

        $articles = $query->latest()->get();
        $title = 'Blog';
        $banner = Banner::latest()->get();

        return view('components.pages.Blog', compact('articles', 'title', 'banner'));
    }
}
