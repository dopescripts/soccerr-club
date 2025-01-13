<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slide = [
            [
                'heading' => 'Play with passion, Win with [[pride]]',
                'image' => '/assets/images/asset 4.jpeg',
            ],
            [
                'heading' => 'Champions [[rise]], Heroes are made',
                'image' => '/assets/images/asset 4.jpeg',
            ]
        ];

        foreach ($slide as $value) {
            \App\Models\HomeSlider::create($slide);
        }
    }
}
