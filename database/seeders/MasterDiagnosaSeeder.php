<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterDiagnosaSeeder extends Seeder
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
                'diagnosa' => 'Kejang Demam',
                'created_at' => now(),
            ],
            [
                'diagnosa' => 'Migren',
                'created_at' => now(),
            ],
            [
                'diagnosa' => 'Insomnia',
                'created_at' => now(),
            ],
        ];

        DB::table('master_diagnosas')->insert($posts);
    }
}
