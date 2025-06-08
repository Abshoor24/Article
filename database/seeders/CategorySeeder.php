<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            // Category::factory(3)->create();
            Category::create([
                'name' => 'Technology',
                'slug' => 'technology',
            ]);

            Category::create([
                'name' => 'Web Design',
                'slug' => 'web-design',
            ]);

            Category::create([
                'name' => 'Programming',
                'slug' => 'programming',
            ]);

            Category::create([
                'name' => 'Lifestyle',
                'slug' => 'lifestyle',
            ]);

            Category::create([
                'name' => 'Health',
                'slug' => 'health',
            ]);
       
    }
}
