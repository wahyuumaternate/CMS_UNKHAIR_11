<?php

namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
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
            $posts = Posts::onlyTrashed()->get();
        } else {
            $posts = Posts::whereNull('deleted_at')->get();
        }
        
        // Menentukan apakah ada posts yang dihapus
        $hasTrashed = $totalTrashed > 0;
    
        // Mengembalikan tampilan dengan data yang diperlukan
        return view('backend.posts.index', compact('posts', 'status', 'hasTrashed', 'totalPosts', 'totalTrashed'));
    }
    
    public function create(){
        return view('backend.posts.create');
    }
// Menyimpan post dan gambar
public function store(Request $request)
{
    try {
       // dd($request->all());
    $request->validate([
        'title' => 'required|string|max:255|unique:posts',
        // 'slug' => 'required|string|max:255|unique:posts',
        // 'excerpt' => 'required|string|max:255',
        'image' => 'required',
        'content' => 'required',
        'status' => 'required|in:draft,published,trashed'
    ]);

    $post = new Posts();
    $post->title = $request->input('title');
    $post->slug = Str::slug($request->input('title'));
    $post->excerpt = Str::limit(strip_tags($request->content), 150);
    $post->status = $request->input('status');
    $post->content = $request->input('content');
    $post->views = 0;
    $post->image = $request->input('image');;
    $post->save();

    return redirect()->route('posts.index')->with('success', 'Post created successfully.');
} catch (\Throwable $th) {
        return redirect()->back()->with('error', 'Post created successfully.'.$th->getMessage());
        //throw $th;
    }
}
public function show($id)
{
    // Temukan post berdasarkan ID
    $post = Posts::findOrFail($id);
     // Convert the enum value to string before passing to the view
    //  $post->status = ucfirst((string) $post->status);
    // Kembalikan tampilan dengan data post
    return view('backend.posts.show', compact('post'));
}

//     public function uploadImage(Request $request)
// {
//     $request->validate([
//         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
//     ]);

//     $image = $request->file('image');
//     $imageName = time() . '.' . $image->getClientOriginalExtension();
//     $image->storeAs('public/images', $imageName);

//     return response()->json(['location' => asset('storage/images/' . $imageName)]);
// }


    public function bulk(Request $request)
    {
        $action = $request->input('action');
        $selectedPosts = $request->input('selected_posts', []);
        
        // Log::info('Bulk action received: ' . $action);
        // Log::info('Selected posts: ' . implode(', ', $selectedPosts));

        if ($action === 'trash') {
            Posts::whereIn('id', $selectedPosts)
                ->update(['status' => PostStatus::Trashed->value, 'deleted_at' => now()]);
            // Soft delete tidak perlu mengatur deleted_at secara manual
        } elseif ($action === 'delete') {
            Posts::whereIn('id', $selectedPosts)
                ->forceDelete(); // Menghapus permanen
        } elseif ($action === 'publish') {
            Posts::whereIn('id', $selectedPosts)
                ->update(['status' => PostStatus::Published->value]);
            // Menghapus timestamp deleted_at tidak diperlukan
        } elseif ($action === 'draft') {
            Posts::whereIn('id', $selectedPosts)
                ->update(['status' => PostStatus::Draft->value]);
            // Menghapus timestamp deleted_at tidak diperlukan
        } elseif ($action === 'kembalikan') {
            Posts::whereIn('id', $selectedPosts)
                ->restore(); // Mengembalikan dari soft delete
            Posts::whereIn('id', $selectedPosts)
                ->update(['status' => PostStatus::Published->value]);
        }

        return redirect()->route('posts.index', ['status' => $request->query('status')])
                     ->with('success', 'Tindakan bulk berhasil dilakukan!');
    }
}
