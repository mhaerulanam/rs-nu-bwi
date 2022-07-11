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


// URI Route Frontend
Route::group(['namespace' => 'App\Http\Controllers\Frontend'], function () {
    Route::get('/', 'BerandaController@index');
    Route::get('/beranda', 'BerandaController@index');
    Route::get('/user/sejarah', 'SejarahController@index');
});

// URI Route Backend
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

});


