<?php

namespace App\Http\Controllers;

use App\Models\Galleries;
use App\Models\GalleriesMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Notify;

class GalleriesController extends Controller
{
    // Menampilkan daftar semua galeri
    public function index()
    {
        $galleries = Galleries::all();  // Ambil semua galeri
        return view('backend.galleries.index', compact('galleries'));
    }

    // Menampilkan form untuk membuat galeri baru
    public function create()
    {
        return view('backend.galleries.create');
    }

    // Menyimpan galeri baru
    public function store(Request $request)
    {
        // dd($request);
        // dd($request->gallery_images);
        try {
            // dd($request->all());
            $request->validate([
                'name' => 'required|string|max:255',
                'image' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:galleries,slug',
                'description' => 'required|string',
                'order' => 'nullable|integer',
                'status' => 'required|string',
                'gallery_images' => 'array', // Array dari URL gambar yang dipilih
                'gallery_images.*.image' => 'required|string', // Setiap item harus memiliki URL gambar
                'gallery_images.*.description' => 'required|string|max:255',
            ]);
    
            // Simpan galeri baru
            $gallery = new Galleries();
            $gallery->name = $request->name;
            $gallery->image = $request->image;
            $gallery->slug = $request->slug;
            $gallery->description = $request->description;
            $gallery->order = $request->order ?? 0;
            $gallery->status = $request->status;
            $gallery->is_featured = $request->has('is_featured');
            $gallery->user_id = Auth::user()->id; // Menyimpan user ID
            $gallery->save();
    
            // Simpan metadata gambar (jika ada gambar yang dipilih)
            if ($request->has('gallery_images')) {
                foreach ($request->gallery_images as $imageData) {
                    $meta = new GalleriesMeta();
                    $meta->gallery_id = $gallery->id;
                    $meta->image = $imageData['image'];
                    $meta->description = $imageData['description']; // Tambahkan deskripsi jika tersedia
                    $meta->save();
                }
            }
            notify()->success('Galeri berhasil dibuat!');
            return redirect()->route('galleries.index');
        } catch (\Throwable $th) {
            // throw $th;
            notify()->error('Galeri gagal dibuat!  -  '.$th->getMessage());
            return redirect()->back();
        }
    }


    // Menampilkan detail galeri
    public function show($id)
    {
        $gallery = Galleries::findOrFail($id);
        return view('backend.galleries.show', compact('gallery'));
    }

    // Menampilkan form untuk mengedit galeri
    public function edit($id)
    {
        $gallery = Galleries::with('metas')->findOrFail($id);
        return view('backend.galleries.edit', compact('gallery'));
    }

    // Menyimpan perubahan galeri
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'image' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:galleries,slug',
                'description' => 'required|string',
                'order' => 'nullable|integer',
                'status' => 'required|string',
                'gallery_images' => 'array', // Array dari URL gambar yang dipilih
                'gallery_images.*.image' => 'required|string', // Setiap item harus memiliki URL gambar
                'gallery_images.*.description' => 'required|string|max:255',
            ]);
    
            $gallery = Galleries::findOrFail($id);
            $gallery->update([
               'name' =>$request->name,
                'image' => $request->image,
                'slug' => $request->slug,
                'description' => $request->description,
                'order' => $request->order ?? 0,
                'status' => $request->status,
                'is_featured' =>  $request->has('is_featured'),
                'user_id' =>Auth::user()->id,
            ]);
    
             // Simpan metadata gambar (jika ada gambar yang dipilih)
             if ($request->has('gallery_images')) {
                foreach ($request->gallery_images as $imageData) {
                    $meta = new GalleriesMeta();
                    $meta->gallery_id = $gallery->id;
                    $meta->image = $imageData['image'];
                    $meta->description = $imageData['description']; // Tambahkan deskripsi jika tersedia
                    $meta->save();
                }
            }
    
            // Menggunakan Laravel Notify untuk menampilkan notifikasi
            notify()->success('Galeri berhasil diperbarui!', 'Success');
            
            return redirect()->route('galleries.index');
        } catch (\Throwable $th) {
            notify()->error('Galeri gagal dibuat!  -  '.$th->getMessage());
            return redirect()->back();
        }
    }

    // Menghapus galeri
    public function destroy($id)
    {
        $gallery = Galleries::findOrFail($id);
        $gallery->delete();

        // Menggunakan Laravel Notify untuk menampilkan notifikasi
        notify()->success('Galeri berhasil dihapus!', 'Success');
        
        return redirect()->route('galleries.index');
    }

    public function destroy_image($id)
{
    $image = GalleriesMeta::find($id);

    // dd($image);
    $image->delete();

    return response()->json(['message' => 'Image deleted successfully']);
}

}
