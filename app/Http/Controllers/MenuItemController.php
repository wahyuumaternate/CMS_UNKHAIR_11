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
       $data =  $request->validate([
            'label' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'parent_id' => 'nullable|integer',
            'page_id' => 'nullable|integer',
        ]);

        $data['menu_id'] = 1;
        $data['order'] = MenuItem::where('menu_id', $request->menu_id)->max('order') + 1;

        // Simpan data menu item ke database dengan nilai 'order' otomatis
        MenuItem::create($data);

        return redirect()->route('menus.create')->with('success', 'Menu item created successfully.');
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

    public function updateOrder(Request $request)
    {
        // Retrieve the menu structure from the request
        $menuItems = $request->input('menu_structure');

        // Define a recursive function to update parent_id and order for each item
        function updateMenuItems($items, $parentId = null)
        {
            foreach ($items as $index => $item) {
                MenuItem::where('id', $item['id'])->update([
                    'parent_id' => $parentId,
                    'order' => $index + 1,
                ]);

                if (isset($item['children'])) {
                    updateMenuItems($item['children'], $item['id']);
                }
            }
        }

        // Update the menu items
        updateMenuItems($menuItems);

        // Return a JSON response
        return response()->json(['success' => true, 'message' => 'Menu order updated successfully']);
    }

    public function destroy($id)
    {
        $menuItem = MenuItem::findOrFail($id);
        $menuItem->delete();

        

 
        return redirect()->back()->with('success', 'Menu item deleted successfully.');
    }
}
