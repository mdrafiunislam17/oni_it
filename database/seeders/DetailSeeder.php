<?php

namespace Database\Seeders;

use App\Models\Detail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Detail::create([
            'title' => 'Trusted Company',
            'image' => 'detail1.jpg',
        ]);

        Detail::create([
            'title' => 'Best Property Deals',
            'image' => 'detail2.jpg',
        ]);

        Detail::create([
            'title' => 'Easy Payment System',
            'image' => 'detail3.jpg',
        ]);
    }
}
