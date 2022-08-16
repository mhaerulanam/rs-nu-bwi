<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokterSeeder extends Seeder
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
                'name' => 'Dr. Ardana',
                'image' => 'dokter1.jpg',
                'id_jabatan' => 1,
                'jadwal' => 'Lorem Ipsum Jadwal',
                'created_at' => now(),
            ],
            [
                'name' => 'Dr. Elisa',
                'image' => 'dokter2.jpg',
                'id_jabatan' => 1,
                'jadwal' => 'Lorem Ipsum Jadwal',
                'created_at' => now(),
            ],
            [
                'name' => 'Dr. Marcell',
                'image' => 'dokter3.jpg',
                'id_jabatan' => 2,
                'jadwal' => 'Lorem Ipsum Jadwal',
                'created_at' => now(),
            ],
        ];

        DB::table('dokters')->insert($posts);
    }
}
