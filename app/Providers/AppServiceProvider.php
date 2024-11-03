<?php

namespace App\Providers;

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
            $query->whereNull('parent_id')->with(['children', 'page'])->orderBy('order');
        }])->where('status', 'aktif')->get();

        // Membagikan variabel $menus ke semua view
        View::share('menus', $menus);
    }
}
