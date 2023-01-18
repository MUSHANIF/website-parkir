<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\laporanController;
use App\Http\Controllers\DatakendaraanController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::middleware('user')->group(function () {
        Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
        Route::post('/tambah/{id}', [App\Http\Controllers\DatakendaraanController::class, 'tambah'])->name('tambah');
        Route::post('/keluar/{id}', [App\Http\Controllers\DatakendaraanController::class, 'keluar'])->name('keluar');
        Route::resource('datakendaraan', DatakendaraanController::class);
    });
    Route::middleware('superadmin')->group(function () {
        
    });
    Route::middleware('admin')->group(function () {
        Route::get('/dashboardAdmin', [dashboardController::class, 'index'])->name('dashboardAdmin');
        Route::get('/belum', [DatakendaraanController::class, 'belum'])->name('belum');
        Route::get('/sudah', [DatakendaraanController::class, 'sudah'])->name('sudah');
        Route::resource('kategori', KategoriController::class);
        Route::get('/excel', [laporanController::class, 'excel']);
        Route::get('/pdf', [laporanController::class, 'pdf']);
    });


    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});
require __DIR__.'/auth.php';

