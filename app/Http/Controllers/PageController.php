<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function create()
    {
        return view('backend.pages.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|unique:pages,slug|max:255',
                'content' => 'required',
                'status' => 'required|boolean',
            ]);
    
            Page::create($request->all());
    
            return redirect()->back()->with('success', 'Page created successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
            //throw $th;
        }
    }
}
