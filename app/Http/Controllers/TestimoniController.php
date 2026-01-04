<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Illuminate\Support\Facades\Storage;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimonials = Testimoni::latest()->get();

        return view('components.pages.Testimoni', [
            'title' => 'Testimoni',
            'testimonials' => $testimonials,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'message' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['name', 'jabatan', 'message', 'rating']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'testimoni/' . uniqid() . '.' . $image->getClientOriginalExtension();

            $manager = new ImageManager(new GdDriver()); // Gunakan class driver-nya langsung
            $image = $manager->read($request->file('image'))->cover(500, 500);
            Storage::disk('public')->put($filename, (string) $image->toJpeg());

            $data['image'] = $filename;
        }

        Testimoni::create($data);

        return redirect()->back()->with('success', 'Testimoni berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $testimoni = Testimoni::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'message' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['name', 'jabatan', 'message', 'rating']);
        if ($request->hasFile('image')) {
            if ($testimoni->image) {
                Storage::disk('public')->delete($testimoni->image);
            }

            $image = $request->file('image');
            $filename = 'testimoni/' . uniqid() . '.' . $image->getClientOriginalExtension();

            $manager = new ImageManager(new GdDriver()); // Gunakan class driver-nya langsung
            $image = $manager->read($request->file('image'))->cover(500, 500);
            Storage::disk('public')->put($filename, (string) $image->toJpeg());

            $data['image'] = $filename;
        }


        $testimoni->update($data);

        return redirect()->back()->with('success', 'Testimoni berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);

        if ($testimoni->image) {
            Storage::disk('public')->delete($testimoni->image);
        }

        $testimoni->delete();

        return redirect()->back()->with('success', 'Testimoni berhasil dihapus!');
    }
}
