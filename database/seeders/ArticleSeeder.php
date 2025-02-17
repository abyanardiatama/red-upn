<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Article::create([
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'title' => 'Judul Artikel Pertama',
        //     'slug' => 'judul-artikel-pertama',
        //     'image' => 'https://loremflickr.com/1920/1080/article',
        //     'excerpt' => 'Ini adalah ringkasan untuk artikel pertama.',
        //     'body' => 'Ini adalah isi lengkap dari artikel pertama. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        // ]);

        // Article::create([
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'title' => 'Judul Artikel Kedua',
        //     'slug' => 'judul-artikel-kedua',
        //     'image' => 'https://loremflickr.com/1920/1080/book',
        //     'excerpt' => 'Ini adalah ringkasan untuk artikel kedua.',
        //     'body' => 'Ini adalah isi lengkap dari artikel kedua. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        // ]);

        // Article::create([
        //     'category_id' => 2,
        //     'user_id' => 1,
        //     'title' => 'Judul Artikel Ketiga',
        //     'slug' => 'judul-artikel-ketiga',
        //     'image' => 'https://loremflickr.com/1920/1080/team',
        //     'excerpt' => 'Ini adalah ringkasan untuk artikel ketiga.',
        //     'body' => 'Ini adalah isi lengkap dari artikel ketiga. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        // ]);

        // Article::create([
        //     'category_id' => 2,
        //     'user_id' => 1,
        //     'title' => 'Judul Artikel Keempat',
        //     'slug' => 'judul-artikel-keempat',
        //     'image' => 'https://loremflickr.com/1920/1080/work',
        //     'excerpt' => 'Ini adalah ringkasan untuk artikel keempat.',
        //     'body' => 'Ini adalah isi lengkap dari artikel keempat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
        // ]);

        // Article::create([
        //     'category_id' => 3,
        //     'user_id' => 1,
        //     'title' => 'Judul Artikel Kelima',
        //     'slug' => 'judul-artikel-kelima',
        //     'image' => 'https://loremflickr.com/1920/1080/teamwork',
        //     'excerpt' => 'Ini adalah ringkasan untuk artikel kelima.',
        //     'body' => 'Ini adalah isi lengkap dari artikel kelima. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        // ]);

        // Article::create([
        //     'category_id' => 3,
        //     'user_id' => 1,
        //     'title' => 'Judul Artikel Keenam',
        //     'slug' => 'judul-artikel-keenam',
        //     'image' => 'https://loremflickr.com/1920/1080/office',
        //     'excerpt' => 'Ini adalah ringkasan untuk artikel keenam.',
        //     'body' => 'Ini adalah isi lengkap dari artikel keenam. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        // ]);

        // Article::create([
        //     'category_id' => 4,
        //     'user_id' => 1,
        //     'title' => 'Judul Artikel Ketujuh',
        //     'slug' => 'judul-artikel-ketujuh',
        //     'image' => 'https://loremflickr.com/1920/1080/technology',
        //     'excerpt' => 'Ini adalah ringkasan untuk artikel ketujuh.',
        //     'body' => 'Ini adalah isi lengkap dari artikel ketujuh. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        // ]);

        // Article::create([
        //     'category_id' => 4,
        //     'user_id' => 1,
        //     'title' => 'Judul Artikel Kedelapan',
        //     'slug' => 'judul-artikel-kedelapan',
        //     'image' => 'https://loremflickr.com/1920/1080/programming',
        //     'excerpt' => 'Ini adalah ringkasan untuk artikel kedelapan.',
        //     'body' => 'Ini adalah isi lengkap dari artikel kedelapan. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        // ]);

        // Article::create([
        //     'category_id' => 5,
        //     'user_id' => 1,
        //     'title' => 'Judul Artikel Kesembilan',
        //     'slug' => 'judul-artikel-kesembilan',
        //     'image' => 'https://loremflickr.com/1920/1080/education',
        //     'excerpt' => 'Ini adalah ringkasan untuk artikel kesembilan.',
        //     'body' => 'Ini adalah isi lengkap dari artikel kesembilan. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
        // ]);

        // Article::create([
        //     'category_id' => 5,
        //     'user_id' => 1,
        //     'title' => 'Judul Artikel Kesepuluh',
        //     'slug' => 'judul-artikel-kesepuluh',
        //     'image' => 'https://loremflickr.com/1920/1080/school',
        //     'excerpt' => 'Ini adalah ringkasan untuk artikel kesepuluh.',
        //     'body' => 'Ini adalah isi lengkap dari artikel kesepuluh. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        // ]);

        // Article::create([
        //     'category_id' => 6,
        //     'user_id' => 1,
        //     'title' => 'Judul Artikel Kesebelas',
        //     'slug' => 'judul-artikel-kesebelas',
        //     'image' => 'https://loremflickr.com/1920/1080/graduation',
        //     'excerpt' => 'Ini adalah ringkasan untuk artikel kesebelas.',
        //     'body' => 'Ini adalah isi lengkap dari artikel kesebelas. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        // ]);

        // Article::create([
        //     'category_id' => 6,
        //     'user_id' => 1,
        //     'title' => 'Judul Artikel Keduabelas',
        //     'slug' => 'judul-artikel-keduabelas',
        //     'image' => 'https://loremflickr.com/1920/1080/motivation',
        //     'excerpt' => 'Ini adalah ringkasan untuk artikel keduabelas.',
        //     'body' => 'Ini adalah isi lengkap dari artikel keduabelas. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        // ]);

        // Article::create([
        //     'category_id' => 6,
        //     'user_id' => 1,
        //     'title' => 'Judul Artikel Ketigabelas',
        //     'slug' => 'judul-artikel-ketigabelas',
        //     'image' => 'https://loremflickr.com/1920/1080/mountain',
        //     'excerpt' => 'Ini adalah ringkasan untuk artikel ketigabelas.',
        //     'body' => 'Ini adalah isi lengkap dari artikel ketigabelas. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        // ]);

        // Article::create([
        //     'category_id' => 6,
        //     'user_id' => 1,
        //     'title' => 'Judul Artikel Keempatbelas',
        //     'slug' => 'judul-artikel-keempatbelas',
        //     'image' => 'https://loremflickr.com/1920/1080/party',
        //     'excerpt' => 'Ini adalah ringkasan untuk artikel keempatbelas.',
        //     'body' => 'Ini adalah isi lengkap dari artikel keempatbelas. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
        // ]);

        // Article::create([
        //     'category_id' => 6,
        //     'user_id' => 1,
        //     'title' => 'Judul Artikel Kelimabelas',
        //     'slug' => 'judul-artikel-kelimabelas',
        //     'image' => 'https://loremflickr.com/1920/1080/film',
        //     'excerpt' => 'Ini adalah ringkasan untuk artikel kelimabelas.',
        //     'body' => 'Ini adalah isi lengkap dari artikel kelimabelas. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        // ]);
    }
}
