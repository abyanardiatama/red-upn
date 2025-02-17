<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Member::create([
            'name' => 'John Doe',
            'jabatan' => 'Ketua Umum',
            'image' => 'https://loremflickr.com/1080/1080/ceo',
        ]);

        Member::create([
            'name' => 'Jonathan Doe',
            'jabatan' => 'Wakil Ketua Umum',
            'image' => 'https://loremflickr.com/1080/1080/cio',
        ]);

        Member::create([
            'name' => 'Jane Doe',
            'jabatan' => 'Sekretaris I',
            'image' => 'https://loremflickr.com/1080/1080/cto',
        ]);

        Member::create([
            'name' => 'Alice Smith',
            'jabatan' => 'Sekretaris II',
            'image' => 'https://loremflickr.com/1080/1080/coo',
        ]);

        Member::create([
            'name' => 'Bob Susanto',
            'jabatan' => 'Bendahara I',
            'image' => 'https://loremflickr.com/1080/1080/cfo',
        ]);

        Member::create([
            'name' => 'Charlie Adi',
            'jabatan' => 'Bendaraha II',
            'image' => 'https://loremflickr.com/1080/1080/cmo',
        ]);

        Member::create([
            'name' => 'David Susilo',
            'jabatan' => 'Ketua Departemen PSDM',
            'image' => 'https://loremflickr.com/1080/1080/cio',
        ]);

        Member::create([
            'name' => 'Eva Susanti',
            'jabatan' => 'Staff Departemen PSDM',
            'image' => 'https://loremflickr.com/1080/1080/cto',
        ]);

        Member::create([
            'name' => 'Felix Surya',
            'jabatan' => 'Staff Departemen PSDM',
            'image' => 'https://loremflickr.com/1080/1080/coo',
        ]);

        Member::create([
            'name' => 'Grace Sutanto',
            'jabatan' => 'Ketua Departemen Litbang',
            'image' => 'https://loremflickr.com/1080/1080/cfo',
        ]);

        Member::create([
            'name' => 'Hendro Sutanto',
            'jabatan' => 'Staff Departemen Litbang',
            'image' => 'https://loremflickr.com/1080/1080/cmo',
        ]);

        Member::create([
            'name' => 'Ivan Surya',
            'jabatan' => 'Staff Departemen Litbang',
            'image' => 'https://loremflickr.com/1080/1080/ceo',
        ]);

        Member::create([
            'name' => 'Jenny Surya',
            'jabatan' => 'Ketua Departemen Medpub',
            'image' => 'https://loremflickr.com/1080/1080/cio',
        ]);

        Member::create([
            'name' => 'Kenny Sutanto',
            'jabatan' => 'Staff Departemen Medpub',
            'image' => 'https://loremflickr.com/1080/1080/cto',
        ]);

        Member::create([
            'name' => 'Lenny Sutanto',
            'jabatan' => 'Staff Departemen Medpub',
            'image' => 'https://loremflickr.com/1080/1080/coo',
        ]);
    }
}
