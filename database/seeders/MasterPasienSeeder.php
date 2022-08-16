<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterPasienSeeder extends Seeder
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
                'no_rm' => 'RM-22-08-001',
                'id_diagnosa' => 2,
                'id_layanan' => 3,
                'alamat' => 'lorem Ipsum',
                'keterangan' => 'Keterangan Lorem Ipsum',
                'id_user' => 2,
                'created_at' => now(),
            ],

        ];

        DB::table('master_pasiens')->insert($posts);
    }
}
