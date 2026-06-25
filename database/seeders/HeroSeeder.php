<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hero;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hero::create([
            'name' => 'Find Your Dream Property',
            'button_text' => 'Browse Now',
            'button_link' => '#',
            'image' => 'hero1.jpg',
        ]);

        Hero::create([
            'name' => 'Best Deals Available',
            'button_text' => 'Get Started',
            'button_link' => '#',
            'image' => 'hero2.jpg',
        ]);
    }
}
