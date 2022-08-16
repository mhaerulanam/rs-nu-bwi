<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
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
                'name_banner' => 'default banner',
                'image' => 'default-banner.png',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'name_banner' => 'primary banner',
                'image' => 'banner-primary.jpg',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'name_banner' => 'secondary banner',
                'image' => 'banner-secondary.jpg',
                'status' => true,
                'created_at' => now(),
            ],
        ];

        DB::table('banners')->insert($posts);
    }
}
