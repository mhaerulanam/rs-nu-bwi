<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BPJSSeeder extends Seeder
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
                'title' => 'Alur BPJS',
                'image' => 'default.jpg',
                'description' => 'Consequat pariatur nostrud anim duis. Consectetur et aliquip excepteur sint proident adipisicing enim dolore. Nulla irure quis mollit consequat nulla minim Lorem sit ex amet. Sint ullamco eu minim est dolore laborum elit. Consequat do non laboris mollit eiusmod eu sit. Esse magna ad nulla ut nulla exercitation magna.

Ex aute tempor eiusmod sunt aliqua sunt sunt. Aliquip proident consequat ipsum mollit. Magna tempor sunt do laborum laborum. Aliquip labore esse fugiat id. Excepteur adipisicing fugiat consectetur voluptate laboris dolor nulla sunt aute. Sit voluptate consequat ex minim veniam do dolore occaecat culpa. Exercitation elit id occaecat aliquip cupidatat aliqua commodo aute excepteur Lorem do ut anim sit.

Elit nulla laboris cupidatat et reprehenderit Lorem pariatur magna ea. Ipsum consequat voluptate mollit ipsum culpa anim enim commodo cupidatat et ut officia et qui. Velit minim amet velit aute tempor in esse aliquip occaecat labore tempor laborum duis consectetur. Anim velit culpa eu nulla.'
            ]
        ];

        DB::table('bpjs')->insert($post);
    }
}
