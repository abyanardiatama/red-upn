<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MerchOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = [
            [
                'merch_id' => 1, // Assuming T-Shirt has ID 1
                'name' => 'John Doe',
                'address' => '123 Main St, Springfield',
                'zip' => '12345',
                'phone' => '555-1234',
                'quantity' => 2,
                'payment_method' => 'Credit Card',
                'image' => 'https://loremflickr.com/720/1080/proof_payment_1',
            ],
            [
                'merch_id' => 2, // Assuming Hoodie has ID 2
                'name' => 'Jane Smith',
                'address' => '456 Elm St, Springfield',
                'zip' => '12345',
                'phone' => '555-5678',
                'quantity' => 1,
                'payment_method' => 'PayPal',
                'image' => 'https://loremflickr.com/720/1080/proof_payment_2',
            ],
            [
                'merch_id' => 3, // Assuming Cap has ID 3
                'name' => 'Alice Johnson',
                'address' => '789 Oak St, Springfield',
                'zip' => '12345',
                'phone' => '555-8765',
                'quantity' => 3,
                'payment_method' => 'Debit Card',
                'image' => 'https://loremflickr.com/720/1080/proof_payment_3',
            ],
            [
                'merch_id' => 4, // Assuming Backpack has ID 5
                'name' => 'Charlie White',
                'address' => '654 Maple St, Springfield',
                'zip' => '12345',
                'phone' => '555-6789',
                'quantity' => 1,
                'payment_method' => 'Cash',
                'image' => 'https://loremflickr.com/720/1080/proof_payment_5',
            ],
        ];

        DB::table('merch_orders')->insert($orders);
    }
}
