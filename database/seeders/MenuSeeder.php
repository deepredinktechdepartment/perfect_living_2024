<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Menu::create(['name' => 'Home', 'url' => '/', 'position' => 'header']);
        Menu::create(['name' => 'About Us', 'url' => '/about', 'position' => 'header']);
        Menu::create(['name' => 'Contact', 'url' => '/contact', 'position' => 'footer']);
    }
}
