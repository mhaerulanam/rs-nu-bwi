<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'title' => 'Dokumentasi 1',
                'description' => 'Amet veniam ad ipsum enim quis Lorem voluptate ex.',
                'image' => '165796087947.jpg',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'title' => 'Dokumentasi 2',
                'description' => 'Amet aute laboris in elit dolore in quis in excepteur enim aliquip dolore cupidatat.',
                'image' => '165796090232.jpg',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'title' => 'Dokumentasi 3',
                'description' => 'Magna laboris proident Lorem do voluptate magna ad reprehenderit est.',
                'image' => '165796101169.jpg',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'title' => 'Dokumentasi 4',
                'description' => 'In deserunt ullamco culpa exercitation in occaecat proident occaecat labore enim cillum et ex deserunt.',
                'image' => '165796108090.jpg',
                'status' => false,
                'created_at' => now(),
            ],
        ];

        DB::table('galeris')->insert($posts);
    }
}
