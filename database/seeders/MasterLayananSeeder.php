<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterLayananSeeder extends Seeder
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
                'layanan' => 'Suntik',
                'created_at' => now(),
            ],
            [
                'layanan' => 'Rekomendasi Obat',
                'created_at' => now(),
            ],
            [
                'layanan' => 'Pelayanan Khusus',
                'created_at' => now(),
            ],
        ];

        DB::table('master_layanans')->insert($posts);
    }
}
