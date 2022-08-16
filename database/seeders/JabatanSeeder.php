<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
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
                'jabatan' => 'Dokter Spesialis',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'jabatan' => 'Medis',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'jabatan' => 'Perawat',
                'status' => true,
                'created_at' => now(),
            ],
        ];

        DB::table('jabatan_dokters')->insert($posts);
    }
}
