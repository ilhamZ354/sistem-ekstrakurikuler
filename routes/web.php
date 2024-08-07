<?php

use App\Http\Controllers\EkskulController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JadwalSiswaController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LaporanKegiatanController;
use App\Http\Controllers\LaporanSiswaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\NilaiSiswaController;
use App\Http\Controllers\OrangtuaController;
use App\Http\Controllers\SiswasController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PDFController;

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
    return view('auth.login');
});

Route::get('/parents', function () {
    return view('auth.loginOrangtua');
});

Route::post('/login/orangtua', [App\Http\Controllers\Auth\LoginController::class, 'loginOrangtua'])->name('login.orangtua.submit');;

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
	Route::get('/cetak-pdf', [PDFController::class, 'cetakPDF'])->name('cetak.pdf');
	Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::resource('guru', GuruController::class);
	Route::resource('kehadiran', LaporanController::class);
	Route::resource('penilaian', NilaiController::class);
	Route::resource('siswa', SiswasController::class);
	Route::resource('nilai', NilaiSiswaController::class);
	Route::resource('orangtua', OrangtuaController::class);
	Route::resource('kegiatan', KegiatanController::class);
	Route::resource('laporankegiatan', LaporanKegiatanController::class);
	Route::resource('laporansiswa', LaporanSiswaController::class);
	Route::resource('jadwal', JadwalController::class, ['except' => ['create']]);
	Route::resource('kegiatan-siswa', EkskulController::class);
	Route::resource('jadwal-siswa', JadwalSiswaController::class);
	Route::get('jadwal/create/{id}', [App\Http\Controllers\JadwalController::class, 'create'])->name('jadwal.create');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	Route::get('map', function () {return view('pages.maps');})->name('map');
	Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

