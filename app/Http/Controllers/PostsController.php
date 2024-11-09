<?php

namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Models\Categories;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        // Mendapatkan status dari query string
        $status = $request->query('status');
        
        // Menghitung total posts yang tidak dihapus
        $totalPosts = Posts::whereNull('deleted_at')->count();
        
        // Menghitung total posts yang dihapus
        $totalTrashed = Posts::onlyTrashed()->count();
        
        // Memilih posts berdasarkan status
        if ($status === 'trashed') {
            $posts = Posts::onlyTrashed()->with('categories')->get();
        } else {
            $posts = Posts::whereNull('deleted_at')->with('categories')->get();
        }
        // dd($posts);
        // Menentukan apakah ada posts yang dihapus
        $hasTrashed = $totalTrashed > 0;
    
        $categories = Categories::all();

        // Mengembalikan tampilan dengan data yang diperlukan
        return view('backend.posts.index', compact('posts','categories', 'status', 'hasTrashed', 'totalPosts', 'totalTrashed'));
    }
    
    public function create()
    {
        $categories = Categories::all();
        return view('backend.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->input('category_id'));
        // Validasi input
        $validatedData = $this->validateRequest($request);
        // dd($validatedData['category_id']);

        // Buat dan simpan pos baru menggunakan mass assignment
        $post = Posts::create([
            'title' => $validatedData['title'],
            'slug' => Str::slug($validatedData['title']),
            'excerpt' => Str::limit(strip_tags($validatedData['content']), 150),
            'status' => $validatedData['status'],
            'content' => $validatedData['content'],
            'comments_is_active' => $validatedData['comments_is_active'],
            'views' => 0,
            'author' => Auth::user()->name,
            'image' => $request->input('image'),
            'category_id' => $request->input('category_id'),
        ]);

        // // Lampirkan kategori jika ada
        // if (!empty($validatedData['category'])) {
        //     $post->categories()->attach($validatedData['category']);
        // }

        // Menggunakan notifikasi notify()
        notify()->success('Post created successfully!');

        return redirect()->route('posts.index');
    }

    private function validateRequest(Request $request)
    {
        //  dd($request->category_id);
        return $request->validate([
            'title' => 'required|string|max:255|unique:posts',
            'content' => 'required',
            'image' => 'required',
            'status' => 'required|in:draft,published,trashed',
            'comments_is_active' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
        ]);
    }

    public function show($id)
    {
        // Temukan post berdasarkan ID
        $post = Posts::findOrFail($id);
        return view('backend.posts.show', compact('post'));
    }

    public function bulk(Request $request)
    {
        $action = $request->input('action');
        $selectedPosts = $request->input('selected_posts', []);
        
        if ($selectedPosts) {
            if ($action === 'trash') {
                Posts::whereIn('id', $selectedPosts)
                    ->update(['status' => PostStatus::Trashed->value, 'deleted_at' => now()]);
                notify()->success('Tindakan bulk berhasil dilakukan: Posts dihapus.');
            } elseif ($action === 'delete') {
                Posts::whereIn('id', $selectedPosts)->forceDelete();
                notify()->success('Tindakan bulk berhasil dilakukan: Posts dihapus permanen.');
            } elseif ($action === 'publish') {
                Posts::whereIn('id', $selectedPosts)
                    ->update(['status' => PostStatus::Published->value]);
                notify()->success('Tindakan bulk berhasil dilakukan: Posts diterbitkan.');
            } elseif ($action === 'draft') {
                Posts::whereIn('id', $selectedPosts)
                    ->update(['status' => PostStatus::Draft->value]);
                notify()->success('Tindakan bulk berhasil dilakukan: Posts dijadikan draft.');
            } elseif ($action === 'kembalikan') {
                Posts::whereIn('id', $selectedPosts)
                    ->restore(); // Mengembalikan dari soft delete
                Posts::whereIn('id', $selectedPosts)
                    ->update(['status' => PostStatus::Published->value]);
                notify()->success('Tindakan bulk berhasil dilakukan: Posts dikembalikan.');
            } else {
                notify()->error('Pilih Tindakan!');
                return redirect()->back();
            }
    
            return redirect()->route('posts.index', ['status' => $request->query('status')]);
        } else {
            notify()->error('Pilih Post Terlebih Dahulu!');
            return redirect()->back();
        }
    }

    public function edit($id)
{
    // Temukan post berdasarkan ID
    $post = Posts::findOrFail($id);
    $categories = Categories::all(); // Mengambil semua kategori untuk dropdown

    // dd($post);
    // dd($post->status); // This will halt execution and display the status
    return view('backend.posts.edit', compact('post', 'categories'));
}


    public function update(Request $request, $id)
    {
        $post = Posts::findOrFail($id);

        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'status' => 'required|in:draft,published,trashed',
            'comments_is_active' => 'required|boolean',
            // 'image' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Menghasilkan slug dari judul
        $slug = Str::slug($request->title);

        // Memperbarui post dengan data yang baru
        $post->update([
            'title' => $request->title,
            'slug' => $slug,
            'image' => $request->input('image'),
            'content' => $request->content,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'comments_is_active' => $request->comments_is_active,
            // Tambahkan kategori jika diperlukan
        ]);

        // // Lampirkan kategori jika ada
        // if ($request->has('category')) {
        //     $post->categories()->sync($request->category);
        // }

        notify()->success('Post berhasil diperbarui.');
        return redirect()->route('posts.index');
    }
}
