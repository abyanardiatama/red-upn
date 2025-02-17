<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Jumbotron;
use App\Models\Merchandise;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(EventSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(JumbotronSeeder::class);
        $this->call(MemberSeeder::class);
        $this->call(MerchandiseSeeder::class);
        $this->call(MerchOrderSeeder::class);
        Article::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin RED',
            'email' => 'red@mail.com',
            'image' => 'https://loremflickr.com/1080/1080/john',
        ]);
        
        User::create([
            'name' => 'Budi',
            'email' => 'budi@mail.com',
            'password' => bcrypt('password'),
            'image' => 'https://loremflickr.com/1080/1080/john',
        ]);

        User::create([
            'name' => 'Susi',
            'email' => 'susi@mail.com', 
            'password' => bcrypt('password'),
            'image' => 'https://loremflickr.com/1080/1080/john',
        ]);

        User::create([
            'name' => 'Adit',
            'email' => 'adit@mail.com', 
            'password' => bcrypt('password'),
            'image' => 'https://loremflickr.com/1080/1080/john',
        ]);

        User::create([
            'name' => 'Dian',
            'email' => 'dian@mail.com',
            'password' => bcrypt('password'),
            'image' => 'https://loremflickr.com/1080/1080/john',
        ]);
    }
}
