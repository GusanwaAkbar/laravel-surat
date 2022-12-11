<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;

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
Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');


Route::post('/surat',[SuratController::class, 'input']);
Route::get('/surat',[SuratController::class, 'surat']);
Route::delete('/surat/{id}',[SuratController::class, 'delete_surat']);
Route::put('/surat/{id}',[SuratController::class, 'update_surat']);


Route::post('/keluar',[SuratController::class, 'tambah']);
Route::get('/keluar',[SuratController::class, 'keluar']);


Route::post('/notulensi',[SuratController::class, 'tambah_notulen']);
Route::get('/notulensi',[SuratController::class, 'notulen']);
Route::delete('/notulensi/{post}',[SuratController::class, 'delete_notulen']);
