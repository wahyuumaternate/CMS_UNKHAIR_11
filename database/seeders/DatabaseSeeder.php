<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Theme;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(MenuSeeder::class);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'), // Hash the password
        ]);
        Categories::create([
            'slug' => 'Berita',
            'name' => 'berita',
        ]);
        Categories::create([
            'slug' => 'News',
            'name' => 'news',
        ]);

        Theme::create([
            'name' => 'news-master',
            'path' => 'themes/news-master',
            'image' => 'themes/news-master.png',
            'active' => 1,
        ]);

        Theme::create([
            'name' => 'nextpage-lite',
            'path' => 'themes/nextpage-lite',
            'image' => 'themes/nextpage-lite.png',
            'active' => 0,
        ]);
        
    }
}
