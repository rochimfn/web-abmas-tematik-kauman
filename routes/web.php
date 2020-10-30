<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

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


Route::get('/warga/masuk', [UserController::class, 'citizenLoginForm'])->name('warga.masuk.formulir');
Route::post('/warga/masuk', [UserController::class, 'citizenLogin'])->name('warga.masuk');
Route::get('/warga/daftar', [UserController::class, 'citizenRegisterForm'])->name('warga.daftar.formulir');
Route::post('/warga/daftar', [UserController::class, 'citizenRegister'])->name('warga.daftar');


Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
