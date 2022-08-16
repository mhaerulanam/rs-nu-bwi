<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\HomecareAdmin;
use App\Models\MasterDiagnosa;
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
            BannerSeeder::class,
            ArticleSeeder::class,
            CategoriArticleSeeder::class,
            FasilitasSeeder::class,
            VisiMisiSeeder::class,
            SejarahSeeder::class,
            StrukturSeeder::class,
            AlurInapSeeder::class,
            AlurJalanSeeder::class,
            AlurIGDSeeder::class,
            BPJSSeeder::class,
            JadwalSeeder::class,
            KonsultasiAdminSeeder::class,
            HomecareAdminSeeder::class,
            UserSeeder::class,
            StafSeeder::class,
            DokterSeeder::class,
            JabatanSeeder::class,
            FasilitasPoliSeeder::class,
            FasilitasIgdSeeder::class,
            FasilitasInapSeeder::class,
            FasilitasPenunjangSeeder::class,
            MasterPasienSeeder::class,
            MasterDiagnosaSeeder::class,
            MasterLayananSeeder::class,
            GaleriSeeder::class,
        ]);
    }
}
