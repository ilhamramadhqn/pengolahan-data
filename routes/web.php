<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerDosen;
use App\Http\Controllers\ControllerMahasiswa;
use App\Http\Controllers\ControllerMitra;
use App\Http\Controllers\ControllerJenisPublikasi;
use App\Http\Controllers\ControllerFakultas;
use App\Http\Controllers\ControllerProdi;
use App\Http\Controllers\ControllerKategoriJurnal;
use App\Http\Controllers\ControllerPenelitian;
use App\Http\Controllers\ControllerPkm;
use App\Http\Controllers\ControllerAnggota;
use App\Http\Controllers\ControllerArtikel;
use App\Http\Controllers\ControllerHKI;
use App\Http\Controllers\ControllerSemester;
use App\Http\Controllers\ControllerSumber;
use App\Http\Controllers\ControllerPelaksana;
use App\Http\Controllers\ControllerPencipta;
use App\Http\Controllers\ControllerPenulis;
use App\Http\Controllers\ControllerJurnal;
use App\Http\Controllers\ControllerJenisHKI;
use App\Http\Controllers\ControllerPengguna;


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

Route::get('/', function () {
     return view('/auth/login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    // Route::get('/home', function ()    {
    //     return view('home');
    // });

    //Kelola Pengguna
    Route::get('/Data-Admin', 'App\Http\Controllers\ControllerPengguna@data_admin')->name('Data-Admin.data_admin');
    Route::get('/Data-Admin/create', 'App\Http\Controllers\ControllerPengguna@create_admin');
    Route::post('/Data-Admin/store', 'App\Http\Controllers\ControllerPengguna@store_admin');
    Route::get('/Data-Admin/{id}', 'App\Http\Controllers\ControllerPengguna@destroy_admin');
    
    Route::get('/Data-Dekan', 'App\Http\Controllers\ControllerPengguna@data_dekan')->name('Data-Dekan.data_admin');
    Route::get('/Data-Dekan/create', 'App\Http\Controllers\ControllerPengguna@create_dekan');
    Route::post('/Data-Dekan/store', 'App\Http\Controllers\ControllerPengguna@store_dekan');
    Route::get('/Data-Dekan/{id}', 'App\Http\Controllers\ControllerPengguna@destroy_dekan');

    Route::get('/Data-Dosen', 'App\Http\Controllers\ControllerPengguna@data_dosen')->name('Data-Dosen.data_admin');
    Route::get('/Data-Dosen/create', 'App\Http\Controllers\ControllerPengguna@create_dosen');
    Route::post('/Data-Dosen/store', 'App\Http\Controllers\ControllerPengguna@store_dosen');
    Route::get('/Data-Dosen/{id}', 'App\Http\Controllers\ControllerPengguna@destroy_dosen');

    Route::get('/Data-Mahasiswa', 'App\Http\Controllers\ControllerPengguna@data_mahasiswa')->name('Data-Mahasiswa.data_admin');
    Route::get('/Data-Mahasiswa/create', 'App\Http\Controllers\ControllerPengguna@create_mahasiswa');
    Route::post('/Data-Mahasiswa/store', 'App\Http\Controllers\ControllerPengguna@store_mahasiswa');
    Route::get('/Data-Mahasiswa/{id}', 'App\Http\Controllers\ControllerPengguna@destroy_mahasiswa');
    
 
    Route::resource('/Mitra', ControllerMitra::class);
    Route::resource('/Dosen', ControllerDosen::class);
    Route::resource('/Mahasiswa', ControllerMahasiswa::class);
 
    Route::resource('/Fakultas', ControllerFakultas::class);
    Route::resource('/Program-Studi', ControllerProdi::class);
    Route::resource('/Jenis-Publikasi', ControllerJenisPublikasi::class);
    Route::resource('/Jenis-Jurnal', ControllerKategoriJurnal::class);
    Route::resource('/Semester', ControllerSemester::class);

    Route::resource('/Sumber', ControllerSumber::class);
    Route::resource('/Pelaksana', ControllerPelaksana::class);
    Route::resource('/Penulis', ControllerPenulis::class);
    Route::resource('/Pencipta', ControllerPencipta::class);

    Route::resource('/Penelitian', ControllerPenelitian::class);
    Route::patch('/Penelitian/{id_penelitian}/acc', 'App\Http\Controllers\ControllerPenelitian@accept');
    Route::patch('/Penelitian/{id_penelitian}/dec', 'App\Http\Controllers\ControllerPenelitian@decline');
    Route::post('/PenelitianImport', 'App\Http\Controllers\ControllerPenelitian@import')->name('PenelitianImport');
    Route::get('/PenelitianImportForm', 'App\Http\Controllers\ControllerPenelitian@import_form')->name('PenelitianImportForm');
    Route::get('/PenelitianExport', 'App\Http\Controllers\ControllerPenelitian@export')->name('PenelitianExport');

    Route::resource('/Pengabdian-Masyarakat', ControllerPkm::class);
    Route::patch('//Pengabdian-Masyarakat/{id_pkm}/acc', 'App\Http\Controllers\ControllerPkm@accept');
    Route::patch('//Pengabdian-Masyarakat/{id_pkm}/dec', 'App\Http\Controllers\ControllerPkm@decline');
    Route::post('/Pengabdian-Masyarakat-Import', 'App\Http\Controllers\ControllerPkm@import')->name('PkmImport');
    Route::get('/Pengabdian-Masyarakat-ImportForm', 'App\Http\Controllers\ControllerPkm@import_form')->name('PkmImportForm');
    Route::get('/Pengabdian-Masyarakat-Export', 'App\Http\Controllers\ControllerPkm@export')->name('PkmExport');

    Route::resource('/Anggota', ControllerAnggota::class);
    Route::resource('/Artikel', ControllerArtikel::class);
    Route::patch('/Artikel/{id_artikel}/acc', 'App\Http\Controllers\ControllerArtikel@accept');
    Route::patch('/Artikel/{id_artikel}/dec', 'App\Http\Controllers\ControllerArtikel@decline');
    Route::resource('/HKI', ControllerHKI::class);
    Route::patch('/HKI/{id_hki}/acc', 'App\Http\Controllers\ControllerHKI@accept');
    Route::patch('/HKI/{id_hki}/dec', 'App\Http\Controllers\ControllerHKI@decline');
    Route::resource('/Jurnal', ControllerJurnal::class);
    Route::patch('/Jurnal/{id_jurnal}/acc', 'App\Http\Controllers\ControllerJurnal@accept');
    Route::patch('/Jurnal/{id_jurnal}/dec', 'App\Http\Controllers\ControllerJurnal@decline');
    Route::get('/home', 'App\Http\Controllers\ControllerPenelitian@grafik_penelitian');

    Route::resource('/Jenis-HKI', ControllerJenisHKI::class);

});