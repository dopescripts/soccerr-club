<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Navlinks;

class NavlinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $navlinks = [
            ['name' => 'Home', 'link' => '/', 'status' => 'enabled'],
            ['name' => 'About', 'link' => '/about', 'status' => 'enabled'],
            ['name' => 'Contact', 'link' => '/contact', 'status' => 'enabled'],
            ['name' => 'Team', 'link' => '/team', 'status' => 'enabled'],
            ['name' => 'Blogs', 'link' => '/blogs', 'status' => 'disabled'],
        ];

        foreach ($navlinks as $navlink) {
            Navlinks::create($navlink);
        }
    }
}
