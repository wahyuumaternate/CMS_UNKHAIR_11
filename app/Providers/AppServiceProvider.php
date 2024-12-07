<?php

namespace App\Providers;

use App\Models\Categories;
use App\Models\GeneralSettings;
use App\Models\Menu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         // Ambil menu aktif beserta itemnya untuk dibagikan ke seluruh view
         $menus = Menu::with(['items' => function ($query) {
            $query->whereNull('parent_id')  // Only top-level items
                  ->with(['children', 'page', 'post', 'category'])  // Eager load relationships
                  ->orderBy('order');  // Optional: Order by 'order' column
        }])
        ->where('status', 'aktif')  // Only fetch active menus
        ->get();
         
        // Ambil semua kategori
        $categoriesAll = Categories::all();

        // Ambil data dari model Setting
        $site_name = GeneralSettings::where('key','site_name')->firstOrFail();
        // Bagikan data ke semua view
        View::share('site_name', $site_name);

        $site_logo = GeneralSettings::where('key','site_logo')->firstOrFail();
        // Bagikan data ke semua view
        View::share('site_logo', $site_logo);

        // Bagikan ke semua view
        View::share('categoriesAll', $categoriesAll);
        // Membagikan variabel $menus ke semua view
        View::share('menus', $menus);
    }
}
