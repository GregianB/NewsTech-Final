<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/beranda' );

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->middleware('guest');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'show']);
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

// Admin
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'getData'])->middleware('auth');
Route::post('/admin/{nama}', [App\Http\Controllers\AdminController::class, 'postData']);
Route::put('/admin/edit/{id}/{nama}', [App\Http\Controllers\AdminController::class, 'editData']);
Route::delete('/admin/{id}', [App\Http\Controllers\AdminController::class, 'deleteData']);

// User
Route::get('/beranda', [App\Http\Controllers\GuestController::class, 'show']);
Route::get('/berita', [App\Http\Controllers\GuestController::class, 'berita']);
Route::get('/berita/detail-berita/{id}', [App\Http\Controllers\GuestController::class, 'detail_berita']);
Route::get('/detail-berita/{id}', [App\Http\Controllers\GuestController::class, 'detail_berita']);

//Komentar
Route::post('/komentar/{id}/{name}/{image}/{id_berita}', [App\Http\Controllers\komentar\CommentController::class, 'komen']);
Route::get('/nokomentar', [App\Http\Controllers\komentar\CommentController::class, 'nokomen']);

//Cari
Route::post('/cari', [App\Http\Controllers\search\CariController::class, 'cari']);
Route::post('/cariAdmin', [App\Http\Controllers\search\CariController::class, 'cariAdmin']);

//profile
Route::get('/profile/{id}', [App\Http\Controllers\profile\ProfileController::class, 'showProfile']);
Route::post('/updateProfile/{id}', [App\Http\Controllers\profile\ProfileController::class, 'update']);
Route::get('/gantipwd/{id}', [App\Http\Controllers\profile\ProfileController::class, 'showPassword']);
Route::post('/updateProfilePassword/{id}', [App\Http\Controllers\profile\ProfileController::class, 'updatePassword']);

//kategori
Route::get('/kategori/{kategori}', [App\Http\Controllers\GuestController::class, 'showByKategori']);