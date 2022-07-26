<?php

namespace Database\Seeders;

use App\Models\HomecareAdmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            VisiMisiSeeder::class,
            StrukturSeeder::class,
            AlurInapSeeder::class,
            AlurJalanSeeder::class,
            AlurIGDSeeder::class,
            BPJSSeeder::class,
            JadwalSeeder::class,
            KonsultasiAdminSeeder::class,
            HomecareAdminSeeder::class,
            UserSeeder::class,
        ]);
    }
}
