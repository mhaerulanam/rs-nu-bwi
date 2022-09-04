<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
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
                'content' => 'Lorem Ipsum',
                'created_at' => now(),
            ],
            [
                'content' => 'default.jpg',
                'created_at' => now(),
            ]
        ];

        DB::table('settings')->insert($posts);
    }
}
