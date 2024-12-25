<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Page;
use App\Models\Posts;
use Illuminate\Http\Request;
use App\Models\Theme;
class FrontEndController extends Controller
{
    public function index()
    {
        $theme = Theme::where('active', true)->first()->path;
    
        // Ambil kategori "Agenda" dan "Pengumuman"
        $agendaPosts = Posts::whereHas('category', function ($query) {
            $query->where('name', 'Agenda');
        })->latest()->get();
    
        $pengumumanPosts = Posts::whereHas('category', function ($query) {
            $query->where('name', 'Pengumuman');
        })->latest()->get();
    
        return view($theme . '.index', compact('agendaPosts', 'pengumumanPosts'));
    }
    
    public function showPage($slug)

    {
        $theme = Theme::where('active', true)->first()->path;
        $data = []; // Data yang diperlukan
    
        // Temukan halaman berdasarkan slug
        $page = Page::where('slug', $slug)->firstOrFail();
        
        return view($theme . '.pages', compact('data','page'));
    }
    public function showPost($slug)
    {
        $theme = Theme::where('active', true)->first()->path;
        $data = []; // Data yang diperlukan
    
        // Temukan halaman berdasarkan slug
        $page = Posts::where('slug', $slug)->firstOrFail();
        
        return view($theme . '.detail_post', compact('data','page'));
    }
    public function showCategories($slug)
    {
        $theme = Theme::where('active', true)->first()->path;
        // $data = []; // Data yang diperlukan
    
        // Temukan halaman berdasarkan slug
        $category = Categories::where('slug', $slug)->firstOrFail();

        $posts = Posts::where('category_id', $category->id)->latest()->get();
        // dd($posts);
        return view($theme . '.posts_categories', compact('category','posts'));
    }
}
