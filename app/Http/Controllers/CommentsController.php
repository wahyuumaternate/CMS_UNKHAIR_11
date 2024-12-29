<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'post_id' => 'required|exists:posts,id', // Pastikan post_id valid
            'content' => 'required|string|min:3|max:500', // Konten minimal 3 karakter
        ]);

        // Simpan komentar
        Comments::create([
            'post_id' => $validated['post_id'],
            'content' => $validated['content'],
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Your comment has been added!');
    }
}
