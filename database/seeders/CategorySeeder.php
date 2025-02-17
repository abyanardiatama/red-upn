<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Berita',
            'slug' => 'berita',
        ]);

        Category::create([
            'name' => 'Tutorial',
            'slug' => 'tutorial',
        ]);

        Category::create([
            'name' => 'Kesehatan',
        'slug' => 'kesehatan',
        ]);

        Category::create([
            'name' => 'Olahraga',
            'slug' => 'olahraga',
        ]);

        Category::create([
            'name' => 'Teknologi',
            'slug' => 'teknologi',
        ]);

        Category::create([
            'name' => 'Politik',
            'slug' => 'politik',
        ]);

        Category::create([
            'name' => 'Ekonomi',
            'slug' => 'ekonomi',
        ]);
    }
}
