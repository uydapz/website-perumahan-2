<?php

namespace App\Http\Controllers;

use App\Models\GambarArticle;
use Illuminate\Support\Facades\Storage;

class GambarController extends Controller
{

    public function destroy($id)
    {
        $gambar = GambarArticle::findOrFail($id);

        // Hapus file dari storage
        if ($gambar->image && Storage::exists('public/' . $gambar->image)) {
            Storage::delete('public/' . $gambar->image);
        }

        // Hapus dari database
        $gambar->delete();

        return back()->with('success', 'Gambar berhasil dihapus.');
    }
}
