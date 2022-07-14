<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KonsultasiAdminSeeder extends Seeder
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
                'title' => 'Bagaimana cara mengurangi rasa sakit maag?',
                'name' => 'Dembele Goa',
                'pekerjaan' => 'PNS',
                'email' => 'dembele30@mail.com',
                'keluhan' => 'Fugiat sit do aliquip laborum voluptate adipisicing cillum deserunt ut. Sint ex anim aliquip culpa cupidatat eiusmod ullamco. Elit in dolore aliqua velit ex dolore dolore deserunt incididunt. Elit fugiat quis eu qui. Aute excepteur nostrud aute magna duis officia exercitation duis mollit aliqua voluptate id. Laboris eiusmod qui ullamco sunt ea eu ex do incididunt. Id labore sint exercitation dolor ipsum ex pariatur cupidatat pariatur duis et eiusmod ea.

Tempor eiusmod veniam voluptate ullamco minim velit Lorem occaecat veniam sunt nulla. Ad laborum reprehenderit id est exercitation eu dolore veniam tempor. Officia amet nostrud quis nisi. Et ex quis ullamco ipsum commodo.',
                // 'balas' => '',
                // 'status_pasien' => null,
                'status_admin' => false,
                'created_at' => now(),
            ]
        ];

        DB::table('konsultasi_admins')->insert($post);
    }
}
