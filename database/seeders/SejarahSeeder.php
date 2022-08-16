<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SejarahSeeder extends Seeder
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
                'name' => 'Rumah Sakit',
                'description' => 'Consectetur occaecat irure aliqua nulla sunt eu aliqua aute id. Magna et officia pariatur non. Ut adipisicing fugiat sint irure aliqua tempor Lorem nisi labore laborum aute mollit. Qui elit dolore ex nostrud incididunt velit qui ut deserunt culpa in elit adipisicing.

Ipsum culpa amet dolore enim esse duis aliquip quis et irure. Deserunt id ex laborum deserunt commodo proident mollit. Consequat sit laboris ex esse reprehenderit ipsum nisi ut nisi quis minim ipsum ex. Culpa do veniam aliquip quis esse officia sit ipsum in. Et nulla consectetur consequat quis magna. Tempor cillum aute id sunt tempor deserunt ut anim.

Ex fugiat pariatur in nisi sunt. Voluptate ullamco in aliquip excepteur aute. Consequat ex Lorem sunt minim amet aute reprehenderit cupidatat sint id exercitation sint sunt velit. Mollit incididunt dolor aliquip nostrud sit. Sunt consequat adipisicing velit id nulla do voluptate ad excepteur. Laboris ad laborum eiusmod consequat non est.',
                'image' => '165779160149.jpg',
                'status' => true,
                'created_at' => now(),
            ],
        ];

        DB::table('sejarahs')->insert($posts);
    }
}
