<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FasilitasPoliSeeder extends Seeder
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
                'title' => 'Poli Klinik',
                'description' => 'Amet veniam ad ipsum enim quis Lorem voluptate ex.',
                'image' => '165752074199.jpg',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'title' => 'Poli Gigi',
                'description' => 'Amet aute laboris in elit dolore in quis in excepteur enim aliquip dolore cupidatat.',
                'image' => '165752074199.jpg',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'title' => 'Poli Mata',
                'description' => 'Magna laboris proident Lorem do voluptate magna ad reprehenderit est.',
                'image' => '165752074199.jpg',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'title' => 'Poli Kulit',
                'description' => 'In deserunt ullamco culpa exercitation in occaecat proident occaecat labore enim cillum et ex deserunt.',
                'image' => '165752074199.jpg',
                'status' => false,
                'created_at' => now(),
            ],
        ];

        DB::table('fasilitas_polis')->insert($posts);
    }
}
