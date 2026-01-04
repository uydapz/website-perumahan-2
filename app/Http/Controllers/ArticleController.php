<?php

namespace App\Http\Controllers;

use App\Models\{Banner, Articles, Testimoni};
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $article = Articles::latest()->get();

        return view('components.pages.Articles', [
            'title' => 'Article',
            'article' => $article,

        ]);
    }

    public function show(Request $reuest, $id)
    {
        $article = Articles::findOrFail($id);
        $banner = Banner::latest()->get();
        $testimoni = Testimoni::latest()->get();
        return view('components.pages.Articles-single', [
            'title' => $article->title,
            'article' => $article,
            'banner' => $banner,
            'testimoni' => $testimoni,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'nullable|string|max:255',
            'deskripsi' => 'required|string',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'gambar.*'  => 'nullable|image|mimes:jpg,jpeg,png|max:10048',
        ]);

        $data = $request->only(['title', 'deskripsi']);

        // Upload foto utama
        if ($request->hasFile('image')) {
            $manager = new ImageManager(new GdDriver());
            $image = $request->file('image');
            $filename = 'article/' . uniqid() . '.' . $image->getClientOriginalExtension();
            $resized = $manager->read($image)->cover(800, 800);
            Storage::disk('public')->put($filename, (string) $resized->encode());
            $data['image'] = $filename;
        }

        // Simpan ke database
        $article = Articles::create($data);

        // Upload foto tambahan
        if ($request->hasFile('gambar')) {
            $manager = new ImageManager(new GdDriver());
            foreach ($request->file('gambar') as $img) {
                $filename = 'article/' . uniqid() . '.' . $img->getClientOriginalExtension();
                $resized = $manager->read($img)->cover(800, 800);
                Storage::disk('public')->put($filename, (string) $resized->encode());

                // Pastikan nama relasi di modelnya sesuai!
                $article->gambar()->create([
                    'image' => $filename
                ]);
            }
        }

        return redirect()->back()->with('success', 'Artikel berhasil ditambahkan!');
    }


    public function update(Request $request, $id)
    {
        $article = Articles::findOrFail($id);

        $request->validate([
            'title'     => 'nullable|string|max:255',
            'deskripsi'   => 'required|string',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'gambar.*'  => 'nullable|image|mimes:jpg,jpeg,png|max:10048',
        ]);

        $data = $request->only(['title', 'deskripsi']);

        // Update foto utama
        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }

            $image = $request->file('image');
            $filename = 'article/' . uniqid() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new GdDriver());
            $resized = $manager->read($image)->cover(800, 800);
            Storage::disk('public')->put($filename, (string) $resized->encode());
            $data['image'] = $filename;
        }

        $article->update($data);

        // Tambah gambar tambahan baru (tidak menghapus yang lama)
        if ($request->hasFile('gambar')) {
            $manager = new ImageManager(new GdDriver());
            foreach ($request->file('gambar') as $img) {
                $filename = 'article/' . uniqid() . '.' . $img->getClientOriginalExtension();
                $resized = $manager->read($img)->cover(800, 800);
                Storage::disk('public')->put($filename, (string) $resized->encode());

                $article->gambar()->create([
                    'image' => $filename
                ]);
            }
        }

        return redirect()->back()->with('success', 'Articles berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $article = Articles::findOrFail($id);

        // Hapus gambar utama
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        // Hapus semua gambar tambahan
        foreach ($article->gambar as $img) {
            Storage::disk('public')->delete($img->image);
            $img->delete();
        }

        $article->delete();

        return redirect()->back()->with('success', 'Articles berhasil dihapus!');
    }
}
