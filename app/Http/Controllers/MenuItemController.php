<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Page;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function create()
    {
        // Mengambil semua item menu dan halaman untuk opsi Parent ID dan Page ID
        $menuItems = MenuItem::all();  // Untuk parent ID
        $pages = Page::all();          // Untuk page ID

        return view('backend.menus.create', compact('menuItems', 'pages'));
    }

    /**
     * Store a newly created menu item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'menu_id' => 'required|integer',
            'label' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'parent_id' => 'nullable|integer',
            'order' => 'required|integer',
            'page_id' => 'nullable|integer',
        ]);

        // Simpan data menu item ke database
        MenuItem::create($request->all());

        return redirect()->back()->with('success', 'Menu item created successfully.');
    }

    /**
     * Display a listing of the menu items.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mendapatkan semua item menu untuk ditampilkan di halaman index
        $menuItems = MenuItem::orderBy('order')->get();

        return view('backend.menus.index', compact('menuItems'));
    }
}
