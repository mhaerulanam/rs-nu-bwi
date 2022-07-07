<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisiMisiSeeder extends Seeder
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
                'name' => "Visi",
                'description' => "Mollit laboris nostrud do cupidatat deserunt. Ut ullamco exercitation ullamco dolore magna ea sit qui. Elit consequat elit incididunt excepteur in adipisicing adipisicing magna enim. Et voluptate ipsum incididunt quis nisi.

Amet ipsum ex incididunt aute. Duis eu sit sit velit exercitation non magna dolor veniam ea commodo consectetur consequat. Do veniam cillum quis mollit irure do nisi cupidatat enim cupidatat est amet. Tempor dolor consectetur laboris ex deserunt tempor occaecat in qui. Cupidatat cillum anim et veniam elit.",
            ],
            [
                'name' => "Misi",
                'description' => "- Excepteur cupidatat adipisicing do anim elit.",
            ],
            [
                'name' => "Srategi",
                'description' => "Do ad irure eiusmod et velit aute eu laborum.",
            ],
        ];

        DB::table('visi_misi_tujuans')->insert($posts);
    }
}
