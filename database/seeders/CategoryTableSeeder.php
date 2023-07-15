<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::create([
        //     'title' => 'Motor',
        //     'description' => 'Motor Description',
        // ]);
        // Category::create([
        //     'title' => 'Fan',
        //     'description' => 'Fan Description',
        // ]);
        // Category::create([
        //     'title' => 'Light',
        //     'description' => 'Light Description',
        // ]);

        Category::factory(20)->create();
    }
}
