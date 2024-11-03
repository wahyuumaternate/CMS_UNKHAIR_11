<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Buat beberapa halaman
        $homePage = Page::create(['title' => 'Home', 'slug' => '/', 'status' => 'aktif']);
        $aboutPage = Page::create(['title' => 'About', 'slug' => 'about', 'status' => 'aktif']);
        $categoryPage = Page::create(['title' => 'Category', 'slug' => 'category', 'status' => 'aktif']);
        $contactPage = Page::create(['title' => 'Contact', 'slug' => 'contact', 'status' => 'aktif']);
        
        // Buat menu utama
        $mainMenu = Menu::create(['name' => 'Main Menu', 'position' => 'top', 'status' => 'aktif']);

        // Tambahkan item menu
        $homeItem = MenuItem::create(['menu_id' => $mainMenu->id, 'page_id' => $homePage->id, 'label' => 'Home', 'order' => 1]);
        $aboutItem = MenuItem::create(['menu_id' => $mainMenu->id, 'page_id' => $aboutPage->id, 'label' => 'About', 'order' => 2]);
        $categoryItem = MenuItem::create(['menu_id' => $mainMenu->id, 'page_id' => $categoryPage->id, 'label' => 'Category', 'order' => 3]);

        // Tambahkan item menu dengan submenu
        $pagesItem = MenuItem::create(['menu_id' => $mainMenu->id, 'label' => 'Pages', 'order' => 4]);
        MenuItem::create(['menu_id' => $mainMenu->id, 'label' => 'Blog', 'parent_id' => $pagesItem->id, 'url' => 'blog', 'order' => 1]);
        
        $subPages = MenuItem::create(['menu_id' => $mainMenu->id, 'label' => 'More Pages', 'parent_id' => $pagesItem->id, 'order' => 2]);
        MenuItem::create(['menu_id' => $mainMenu->id, 'page_id' => $contactPage->id, 'label' => 'Contact Us', 'parent_id' => $subPages->id, 'order' => 1]);
    }
}
