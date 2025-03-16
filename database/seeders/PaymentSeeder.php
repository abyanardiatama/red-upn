<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Payment::create([
            'payment_method' => 
                //make list
                'BCA => 1234567890,
                BNI => 1234567890,
                BRI => 1234567890,
                Mandiri => 1234567890,
                OVO => 1234567890,
                DANA => 1234567890,
                GOPAY => 1234567890',
            'barcode' => 'https://placehold.co/192x192',
        ]);
    }
}
