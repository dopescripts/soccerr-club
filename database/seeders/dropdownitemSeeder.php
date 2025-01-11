<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\dropdownitem;

class dropdownitemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dropdownitems = [
            [
                'navlinks_id' => 2,
                'name' => 'Products',
                'link' => '/products',
            ],
            [
                'navlinks_id' => 2,
                'name' => 'Categories',
                'link' => '/categories',
            ],
        ];

        foreach ($dropdownitems as $dropdownitem) {
            dropdownitem::create($dropdownitem);
        }
    }
}
