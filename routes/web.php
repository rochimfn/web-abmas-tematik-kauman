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
Route::middleware('auth', 'admin')->group(function() {
	Route::get('/cetak/{id}', [SuratController::class, 'cetakSurat'])->name('cetak.surat');
});

// Rute untuk warga
Route::middleware('auth', 'warga')->group(function() {
	Route::get('/beranda', [WargaController::class, 'beranda'])->name('beranda.warga');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::get('/posts/buat', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::delete('/posts/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
Route::get('/posts/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
Route::post('/posts/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');