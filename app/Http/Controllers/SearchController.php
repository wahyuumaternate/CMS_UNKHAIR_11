<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchMenu(Request $request)
    {
        $query = $request->input('q');

        // Sample data for menu items
        $menuItems = [
            ['name' => 'Blog > Post collections', 'url' => route('posts.index')],
            ['name' => 'Galleries', 'url' => '/galleries'],
            ['name' => 'Contact > Custom Fields', 'url' => '/contact/custom-fields'],
            ['name' => 'Newsletters', 'url' => '/newsletters'],
            ['name' => 'Appearance > Custom HTML', 'url' => '/appearance/custom-html'],
            ['name' => 'Plugins > Installed Plugins', 'url' => '/plugins/installed-plugins'],
            ['name' => 'Plugins > Add New Plugin', 'url' => '/plugins/add-new-plugin'],
            ['name' => 'Platform Administration', 'url' => '/platform-administration'],
            ['name' => 'Settings > Common > General', 'url' => '/settings/common/general'],
            ['name' => 'Settings > Common > Email', 'url' => '/settings/common/email'],
        ];

        // Filter menu items based on the query
        $results = array_filter($menuItems, function ($item) use ($query) {
            return stripos($item['name'], $query) !== false;
        });

        return response()->json(array_values($results));
    }
}
