<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'name' => 'Rapat Terbuka',
            'description' => '
                Rapat Terbuka adalah rapat yang dihadiri oleh semua anggota perusahaan. Rapat ini biasanya diadakan untuk membahas hal-hal penting yang berkaitan dengan perusahaan.
            ',
            'image' => 'https://loremflickr.com/400/600/people',
        ]);

        Event::create([
            'name' => 'Festival Budaya Nusantara',
            'description' => '
                Festival Budaya Nusantara menghadirkan kekayaan budaya dari berbagai daerah di Indonesia. Acara ini menyuguhkan tarian tradisional, musik daerah, dan pameran kerajinan tangan yang unik.
            ',
            'image' => 'https://loremflickr.com/400/600/flower',
        ]);

        Event::create([
            'name' => 'Konser Musik Amal',
            'description' => 'Konser Musik Amal mengundang berbagai musisi terkenal untuk tampil dan menghibur penonton. Seluruh hasil dari penjualan tiket akan disumbangkan untuk kegiatan sosial, termasuk bantuan untuk anak-anak yang membutuhkan.',
            'image' => 'https://loremflickr.com/400/600/books',
        ]);

        Event::create([
            'name' => 'Pelatihan Kewirausahaan',
            'description' => 'Pelatihan Kewirausahaan adalah program yang bertujuan untuk memberikan pengetahuan dan keterampilan kepada peserta agar dapat memulai usaha sendiri.',
            'image' => 'https://loremflickr.com/400/600/library',
        ]);

        Event::create([
            'name' => 'Seminar Kesehatan Mental',
            'description' => 'Seminar Kesehatan Mental mengundang para ahli untuk memberikan informasi dan tips tentang kesehatan mental. Peserta akan diajarkan cara mengatasi stres, depresi, dan kecemasan.', 
            'image' => 'https://loremflickr.com/400/600/computer',
        ]);

    }
}
