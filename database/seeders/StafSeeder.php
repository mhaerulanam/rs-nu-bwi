<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StafSeeder extends Seeder
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
                'name' => 'staf',
                'jabatan' => 'Admin',
                'image' => 'admin.jpg',
                'created_at' => now(),
            ],
        ];

        DB::table('stafs')->insert($posts);
    }
}
