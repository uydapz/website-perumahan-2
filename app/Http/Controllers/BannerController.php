<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::latest()->get();

        return view('components.pages.Banner', [
            'title' => 'Banner',
            'banner' => $banner,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('image')->store('banners', 'public');

        Banner::create(['image' => $path]);

        return redirect()->back()->with('success', 'Banner berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Hapus gambar lama
        if ($banner->image) {
            Storage::disk('public')->delete($banner->image);
        }

        // Simpan gambar baru
        $path = $request->file('image')->store('banners', 'public');

        $banner->update(['image' => $path]);

        return redirect()->back()->with('success', 'Banner berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        if ($banner->image) {
            Storage::disk('public')->delete($banner->image);
        }

        $banner->delete();

        return redirect()->back()->with('success', 'Banner berhasil dihapus!');
    }
}
