<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FasilitasSeeder extends Seeder
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
                'name' => 'Poli',
                'description' => 'Amet veniam ad ipsum enim quis Lorem voluptate ex.',
                'image' => '165778830975.png',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'name' => 'IGD',
                'description' => 'Amet aute laboris in elit dolore in quis in excepteur enim aliquip dolore cupidatat.',
                'image' => '165778830975.png',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'name' => 'Laboratorium',
                'description' => 'Magna laboris proident Lorem do voluptate magna ad reprehenderit est.',
                'image' => '165778830975.png',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'name' => 'Penunjang Medis',
                'description' => 'In deserunt ullamco culpa exercitation in occaecat proident occaecat labore enim cillum et ex deserunt.',
                'image' => '165778830975.png',
                'status' => true,
                'created_at' => now(),
            ],
        ];

        DB::table('fasilitas')->insert($posts);
    }
}
