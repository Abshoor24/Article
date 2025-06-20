<?php

namespace Database\Seeders;

use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // CARA 1 (SEMUA DI JADIKAN 1 SEEDER)
        // Post::factory(100)->recycle([
        //     Category::factory(3)->create(),
        //     User::factory(5)->create()
        // ])->create();

        // CARA 2 (MENGGUNAKAN SEEDER TERPISAH)
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
        ]);

        Post::factory(100)->recycle([
            // Menggunakan data yang sudah ada dari seeder
            Category::all(),
            User::all()
        ])->create();

    }
}
