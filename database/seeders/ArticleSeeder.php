<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\Middleware\TrustProxies;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
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
                'title' => 'Cara mengatasi migrane',
                'description' => 'Tempor non enim veniam aliqua aliqua laborum aliqua adipisicing do. Excepteur labore ex magna elit dolor reprehenderit amet veniam dolor ipsum. Magna dolore nulla sunt amet esse sint. Consectetur quis est labore enim consequat duis nulla culpa reprehenderit sunt non reprehenderit. Irure irure voluptate laborum irure tempor do nostrud labore elit anim id. Dolor occaecat enim nostrud proident in ut aliqua elit ex eu et.

Lorem proident est fugiat sunt esse aliquip ipsum labore. Lorem id ipsum magna qui. Anim anim dolor ex reprehenderit. Laborum incididunt duis cillum aute sunt tempor labore. Tempor do nostrud mollit ullamco sunt ad pariatur quis magna consectetur fugiat deserunt.

Ullamco elit Lorem reprehenderit ex velit duis qui enim voluptate veniam excepteur minim excepteur velit. Nulla est elit labore non anim incididunt. Exercitation fugiat amet incididunt ea ipsum. Non exercitation eu eu excepteur occaecat sunt ex fugiat anim cillum.',
                'image' => '16577891476.jpg',
                'id_category' => 1,
                'status' =>  true,
                'created_at' => now(),
            ],
        ];

        DB::table('articles')->insert($posts);
    }
}
