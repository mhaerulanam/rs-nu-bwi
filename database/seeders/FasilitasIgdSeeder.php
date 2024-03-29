<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FasilitasIgdSeeder extends Seeder
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
                'description' => 'Amet veniam ad ipsum enim quis Lorem voluptate ex.',
                'image' => '16579481105.jpg',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'description' => 'Amet aute laboris in elit dolore in quis in excepteur enim aliquip dolore cupidatat.',
                'image' => '16579481105.jpg',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'description' => 'Magna laboris proident Lorem do voluptate magna ad reprehenderit est.',
                'image' => '16579481105.jpg',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'description' => 'In deserunt ullamco culpa exercitation in occaecat proident occaecat labore enim cillum et ex deserunt.',
                'image' => '16579481105.jpg',
                'status' => false,
                'created_at' => now(),
            ],
        ];

        DB::table('fasilitas_igds')->insert($posts);
    }
}
