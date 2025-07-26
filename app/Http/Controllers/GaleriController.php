<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    // Tampilkan semua postingan
    public function index()
    {
        $galeris = Galeri::latest()->get();
        return view('galeri/postingan', compact('galeris'));
    }

    public function create()
    {
        return view('galeri/tambah_postingan');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'caption' => 'required|string|max:255',
            'path' => 'required',
            'path.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $paths = [];

        foreach ($request->file('path') as $file) {
            $paths[] = $file->store('galeri', 'public');
        }

        Galeri::create([
            'caption' => $validated['caption'],
            'paths' => $paths,
        ]);

        return redirect()->route('galeri.index')->with('success', 'Postingan berhasil ditambahkan!');
    }

    public function show($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('galeri/detail_postingan', compact('galeri'));
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        // Hapus semua file paths
        if (is_array($galeri->paths)) {
            foreach ($galeri->paths as $path) {
                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
            }
        }

        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Postingan berhasil dihapus!');
    }

}
