<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FasilitasInapSeeder extends Seeder
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
                'title' => 'Ruang Inap 1',
                'description' => 'Amet veniam ad ipsum enim quis Lorem voluptate ex.',
                'image' => '165795492561.jpg',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'title' => 'Ruang Inap 2',
                'description' => 'Amet aute laboris in elit dolore in quis in excepteur enim aliquip dolore cupidatat.',
                'image' => '165795492561.jpg',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'title' => 'Ruang Inap 3',
                'description' => 'Magna laboris proident Lorem do voluptate magna ad reprehenderit est.',
                'image' => '165795492561.jpg',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'title' => 'Ruang Inap 4',
                'description' => 'In deserunt ullamco culpa exercitation in occaecat proident occaecat labore enim cillum et ex deserunt.',
                'image' => '165795492561.jpg',
                'status' => false,
                'created_at' => now(),
            ],
        ];

        DB::table('fasilitas_inaps')->insert($posts);
    }
}
