<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriArticleSeeder extends Seeder
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
                'name_category' => 'Pusing',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'name_category' => 'Tipes',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'name_category' => 'Maag',
                'status' => true,
                'created_at' => now(),
            ],
        ];

        DB::table('category_articles')->insert($posts);
    }
}
