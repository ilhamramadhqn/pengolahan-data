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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function ()    {
        return view('home');
    });
    //Kelola Pengguna
    // Route::get('/Data-Admin', ControllerAdmin::class);
    // Route::get('/Data-Dekan', ControllerDekan::class);
    // Route::get('/Data-Dosen', ControllerDosen::class);
    // Route::get('/Data-Mahasiswa', ControllerMahasiswa::class);
    
    //Master Data
    Route::resource('/Mitra', ControllerMitra::class);
    Route::resource('/Dosen', ControllerDosen::class);
    Route::resource('/Mahasiswa', ControllerMahasiswa::class);
    //Master Rekapitulasi
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
    Route::resource('/Pengabdian-Masyarakat', ControllerPkm::class);

    Route::resource('/Anggota', ControllerAnggota::class);
    Route::resource('/Artikel', ControllerArtikel::class);
    Route::resource('/HKI', ControllerHKI::class);
    Route::resource('/Jurnal', ControllerJurnal::class);

    Route::resource('/Jenis-HKI', ControllerJenisHKI::class);

});