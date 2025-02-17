<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MerchandiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $merchandises = [
            [
                'name' => 'T-Shirt',
                'description' => 'A comfortable cotton t-shirt.',
                'price' => '299000', // Price in Rupiah
                'image' => 'https://loremflickr.com/720/720/T-Shirt',
                'status' => 1,
                'status_active' => 1,
            ],
            [
                'name' => 'Hoodie',
                'description' => 'A warm and cozy hoodie.',
                'price' => '599000', // Price in Rupiah
                'image' => 'https://loremflickr.com/720/720/Hoodie',
                'status' => 1,
                'status_active' => 1,
            ],
            [
                'name' => 'Cap',
                'description' => 'A stylish cap for sunny days.',
                'price' => '199000', // Price in Rupiah
                'image' => 'https://loremflickr.com/720/720/Cap',
                'status' => 1,
                'status_active' => 1,
            ],
            [
                'name' => 'Mug',
                'description' => 'A ceramic mug for your favorite beverage.',
                'price' => '89000', // Price in Rupiah
                'image' => 'https://loremflickr.com/720/720/Mug',
                'status' => 1,
                'status_active' => 1,
            ],
            [
                'name' => 'Backpack',
                'description' => 'A durable backpack for everyday use.',
                'price' => '799000', // Price in Rupiah
                'image' => 'https://loremflickr.com/720/720/Backpack',
                'status' => 1,
                'status_active' => 1,
            ],
        ];

        DB::table('merchandises')->insert($merchandises);
    }
}
