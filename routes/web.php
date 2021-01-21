<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\WargaController;

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
	return view('welcome');
});

// Rute untuk admin
Route::middleware('auth', 'admin')->group(function () {	
	Route::get('/cetak/{id}', [SuratController::class, 'cetakSurat'])->name('cetak.surat');

	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	Route::get('/psurats', [App\Http\Controllers\SuratController::class, 'index'])->name('psurat.index');
	Route::get('/psurats/diajukan', [App\Http\Controllers\SuratController::class, 'diajukan'])->name('psurat.diajukan');
	Route::get('/psurats/diproses', [App\Http\Controllers\SuratController::class, 'diproses'])->name('psurat.diproses');
	Route::get('/psurats/ditolak', [App\Http\Controllers\SuratController::class, 'ditolak'])->name('psurat.ditolak');
	Route::get('/psurats/selesai', [App\Http\Controllers\SuratController::class, 'selesai'])->name('psurat.selesai');
	
	Route::post('/psurat/diproses/{id}', [App\Http\Controllers\SuratController::class, 'prosesSurat'])->name('psurat.prosesSurat');
	Route::post('/psurat/ditolak/{id}', [App\Http\Controllers\SuratController::class, 'tolakSurat'])->name('psurat.tolakSurat');
	Route::post('/psurat/selesai/{id}', [App\Http\Controllers\SuratController::class, 'selesaiSurat'])->name('psurat.selesaiSurat');
	
	Route::get('/psurats/show/{id}', [App\Http\Controllers\SuratController::class, 'show'])->name('psurat.show');
	Route::get('/psurats/informasi/{id}', [App\Http\Controllers\SuratController::class, 'informasi'])->name('psurat.informasi');
	Route::delete('/psurats/{id}', [App\Http\Controllers\SuratController::class, 'destroy'])->name('psurat.destroy');
	Route::post('/psurats/{id}', [App\Http\Controllers\SuratController::class, 'update'])->name('psurat.update');

	//pemberitahuan
	Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
	Route::get('/posts/buat', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
	Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
	Route::delete('/posts/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
	Route::get('/posts/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
	Route::post('/posts/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
	Route::get('/posts/show/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');

	//user
	Route::get('/user/tambah', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
	Route::post('/user/tambah', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
});

// Rute untuk warga
Route::middleware('auth', 'warga')->group(function () {
	Route::get('/beranda', [WargaController::class, 'beranda'])->name('beranda.warga');
	Route::get('/ajukan/{id}', [SuratController::class, 'ajukanSuratForm'])->name('ajukan.warga');
	Route::post('/ajukan/{id}', [SuratController::class, 'ajukanSurat'])->name('ajukan.surat.warga');
});

Auth::routes(['register' => false]);


