<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
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
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password'  => '$2y$10$nZOKK1RuT9w./48IkbqufuawL.UvfxR0Nw7i04K5UiGhqvXiyfZae',
                'role' => 1,
                'created_at' => now(),
            ]
        ];


        DB::table('users')->insert($post);
    }
}
