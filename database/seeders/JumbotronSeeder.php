<?php

namespace Database\Seeders;

use App\Models\Jumbotron;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JumbotronSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Jumbotron::create([
            'title' => 'Welcome to our website',
            'image' => 'https://loremflickr.com/1920/1080/seminar',
        ]);
        
        Jumbotron::create([
            'title' => 'Charity Event',
            'image' => 'https://loremflickr.com/1920/1080/charity',
        ]);

        Jumbotron::create([
            'title' => 'Join our community',
            'image' => 'https://loremflickr.com/1920/1080/teamwork',
        ]);

        Jumbotron::create([
            'title' => 'Get involved',
            'image' => 'https://loremflickr.com/1920/1080/community',
        ]);

        Jumbotron::create([
            'title' => 'Donate now',
            'image' => 'https://loremflickr.com/1920/1080/sport',
        ]);

        Jumbotron::create([
            'title' => 'Help us to help others',
            'image' => 'https://loremflickr.com/1920/1080/office',
        ]);
    }
}
