<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Firebase\BukuController;

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

Route::get('buku', [BukuController::class, 'index']);
Route::get('bukustaff', [BukuController::class, 'staff']);
Route::get('bukuguest', [BukuController::class, 'bukuguest']);
Route::get('logout', [BukuController::class, 'ceklogout']);
Route::get('bacabuku/{id}', [BukuController::class, 'baca']);
Route::get('tambah-buku', [BukuController::class, 'tambah']);
Route::post('tambah-buku', [BukuController::class, 'simpanbuku']);
Route::get('edit-buku/{id}', [BukuController::class, 'editbuku']);
Route::put('update-buku/{id}', [BukuController::class, 'updatebuku']);
Route::get('hapus-buku/{id}', [BukuController::class, 'hapusbuku']);
Route::get('hapus-buku/{id}', [BukuController::class, 'hapusbuku']);

Route::get('login', [BukuController::class, 'login']);
Route::get('daftar', [BukuController::class, 'daftar']);
Route::post('ceklogin', [BukuController::class, 'ceklogin']);
Route::post('cekdaftar', [BukuController::class, 'cekdaftar']);

Route::get('/', function () {
    return view('welcome');
});
