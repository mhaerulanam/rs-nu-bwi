<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// URI Route Public
Route::group(['namespace' => 'App\Http\Controllers\Auth'], function () {
    Route::get('/admin', 'AuthenticatedSessionController@index');
});

// URI Route Frontend
Route::group(['namespace' => 'App\Http\Controllers\Frontend'], function () {
    Route::get('/', 'BerandaController@index')->name('beranda');
    Route::get('/beranda', 'BerandaController@index');
    Route::get('/user/sejarah', 'SejarahController@index');
    Route::get('/user/visimisi', 'VisiMisiController@index');
    Route::get('/user/struktur-organisasi', 'StrukturOrganisasiController@index');
    Route::get('/user/dokter', 'DokterController@index');
    Route::get('/user/alur-inap', 'AlurInapController@index');
    Route::get('/user/alur-jalan', 'AlurJalanController@index');
    Route::get('/user/alur-igd', 'AlurIgdController@index');
    Route::get('/user/bpjs', 'BpjsController@index');
    Route::get('/user/jadwal-kegiatan', 'JadwalKegiatanController@index');

    Route::get('/user/fasilitas-poli', 'FasilitasPoliController@index');
    Route::get('/user/fasilitas-igd', 'FasilitasIgdController@index');
    Route::get('/user/fasilitas-inap', 'FasilitasInapController@index');
    Route::get('/user/fasilitas-penunjang', 'FasilitasPenunjangController@index');

    Route::get('/user/galeri', 'GaleriController@index');
    Route::get('/user/berita', 'BeritaController@index')->name('search-article');
    Route::get('/user/detail/berita/{id}', 'BeritaController@show')->name('show-article');
    Route::get('/user/berita/{kategori}', 'BeritaController@kategori')->name('kategori-article');

    Route::get('/user/konsultasi', 'KonsultasiController@index');
    Route::post('/detail-konsultasi', 'KonsultasiController@show');
    Route::post('/add-konsultasi', 'KonsultasiController@store')->name('konsultasi-user');
    Route::post('/update-konsultasi', 'KonsultasiController@update')->name('update-konsultasi-user');
    Route::get('/user/add-konsultasi', 'KonsultasiController@addKonsultasi');

    Route::get('/user/homecare', 'HomecareController@index');
    Route::post('/show-homecare', 'HomecareController@show');
    Route::post('/add-homecare', 'HomecareController@store')->name('add-homecare');

    Route::get('/change-password', 'ChangePasswordController@index');
    Route::post('/change-password', 'ChangePasswordController@changePassword')->name('change.password');
});

// URI Route Backend
Route::group(['middleware' => 'auth'], function () {
    // Route::auth();
    Route::group(['namespace' => 'App\Http\Controllers\Backend'], function () {
        Route::resource('/dashboard', 'BannerController');
        Route::resource('/banner', 'BannerController');
        Route::resource('/fasilitas', 'FasilitasController');
        Route::resource('/article', 'ArticleController');
        Route::resource('/category-article', 'CategoryArticleController');

        Route::resource('/sejarah', 'SejarahController');
        Route::resource('/visimisi', 'VisiMisiTujuanController');
        Route::resource('/struktur', 'StrukturController');
        Route::resource('/staf', 'StafController');

        Route::resource('/dokter', 'DokterController');
        Route::resource('/jabatan-dokter', 'JabatanDokterController');
        Route::resource('/alur-inap', 'AlurInapController');
        Route::resource('/alur-jalan', 'AlurJalanController');
        Route::resource('/alur-igd', 'AlurIGDController');
        Route::resource('/bpjs', 'BPJSController');
        Route::resource('/jadwal-kegiatan', 'JadwalController');

        Route::resource('/fasilitas-poli', 'FasilitasPoliController');
        Route::resource('/fasilitas-igd', 'FasilitasIgdController');
        Route::resource('/fasilitas-inap', 'FasilitasInapController');
        Route::resource('/fasilitas-penunjang', 'FasilitasPenunjangController');

        Route::resource('/konsultasi-admin', 'KonsultasiAdminController');
        Route::get('/konsultasi-admin/{id}/detail', 'KonsultasiAdminController@detail')->name('detail-konsultasi-admin');

        Route::resource('/homecare-admin', 'HomecareAdminController');

        Route::resource('/master-pasien', 'MasterPasienController');
        Route::resource('/master-diagnosa', 'MasterDiagnosaController');
        Route::resource('/master-layanan', 'MasterLayananController');
        Route::resource('/master-pegawai', 'MasterPegawaiController');

        Route::resource('/galeri', 'GaleriController');
    });
});


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
