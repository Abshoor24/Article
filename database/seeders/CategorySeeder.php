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
                'color' => 'red',
            ]);

            Category::create([
                'name' => 'Web Design',
                'slug' => 'web-design',
                'color' => 'blue',
            ]);

            Category::create([
                'name' => 'Programming',
                'slug' => 'programming',
                'color' => 'green',
            ]);

            Category::create([
                'name' => 'Lifestyle',
                'slug' => 'lifestyle',
                'color' => 'gray',
            ]);

            Category::create([
                'name' => 'Health',
                'slug' => 'health',
                'color' => 'yellow',
            ]);
       
    }
}
