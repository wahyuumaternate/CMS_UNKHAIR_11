<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchMenu(Request $request)
    {
        $query = $request->input('q');

        // data for menu items
        $menuItems = [
            ['name' => 'Dashboard', 'url' => route('dashboard')],
            ['name' => 'Posts', 'url' => route('posts.index')],
            ['name' => 'Posts > Add Posts', 'url' => route('posts.create')],
            ['name' => 'Categories', 'url' => route('posts.categories.index')],
            ['name' => 'Themes', 'url' => route('tema.index')],
            ['name' => 'Media', 'url' => route('media.index')],
            ['name' => 'Pages', 'url' => route('pages.index')],
            ['name' => 'Pages > Add Pages', 'url' => route('pages.create')],
            ['name' => 'Menu', 'url' => route('menus.create')],
            
        ];

        // Filter menu items based on the query
        $results = array_filter($menuItems, function ($item) use ($query) {
            return stripos($item['name'], $query) !== false;
        });

        return response()->json(array_values($results));
    }
}
