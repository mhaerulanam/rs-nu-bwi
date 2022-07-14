<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomecareAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = [
            [
                'id_pasien' => 'RM-22-07-001',
                'kondisi_pasien' => 'Sehat',
            ]
        ];

        DB::table('homecare_admins')->insert($post);
    }
}
