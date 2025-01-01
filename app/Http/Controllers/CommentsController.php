<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comments::latest()->get(); // Ambil semua komentar
        return view('backend.comments.index', compact('comments'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        // Validasi input
        $validated = $request->validate([
            'post_id' => 'required|exists:posts,id', // Pastikan post_id valid
            'content' => 'required|string|min:3|max:500', // Konten minimal 3 karakter
            'name' => 'required|string|min:3|max:500', // Nama minimal 3 karakter
            'email' => 'required|email|min:3|max:500', // Pastikan email valid
        ]);
    
        // Simpan komentar
        Comments::create([
            'post_id' => $validated['post_id'],
            'content' => $validated['content'],
            'name' => $validated['name'],    // Menambahkan kolom name
            'email' => $validated['email'],  // Menambahkan kolom email
        ]);
    
       // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Komentar Anda telah ditambahkan dan sedang diverifikasi!');

    }

    // Menampilkan form edit komentar
    public function edit($id)
    {
        $comment = Comments::findOrFail($id); // Cari komentar berdasarkan ID
        // Tandai komentar sebagai sudah dibaca (read = true)
        if (!$comment->read) {
            $comment->update(['read' => true]);
        }
        return view('backend.comments.edit', compact('comment')); // Kirim data komentar ke view
    }

    // Mengupdate komentar
    public function update(Request $request, $id)
    {
        $comment = Comments::findOrFail($id); // Cari komentar berdasarkan ID

        // Validasi input
        $validated = $request->validate([
            'status' => 'required|string', // Status harus valid
        ]);

        // Update data komentar
        $comment->update([
           
            'status' => $validated['status'],
        ]);

        // Redirect ke halaman komentar dengan pesan sukses
        notify()->success('Komentar berhasil diperbarui!');
        return redirect()->route('comments.index')->with('success', 'Komentar berhasil diperbarui!');
    }


    // Menghapus komentar
    public function destroy($id)
    {
        $comment = Comments::findOrFail($id); // Cari komentar berdasarkan ID
        $comment->delete(); // Hapus komentar

        // Redirect ke halaman komentar dengan pesan sukses
        notify()->success('Komentar berhasil dihapus!');
        return redirect()->route('comments.index');
    }
    
}
