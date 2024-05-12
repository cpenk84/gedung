<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;

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

Route::get('/', function () {
    // return view('dashboard');
    // return view('welcome');
});
  
Auth::routes();
  
Route::get('/', [HomeController::class, 'index'])->name('home');
  
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('gedungs', GedungController::class);
    Route::resource('pelanggans', PelangganController::class);
    Route::resource('transaksis', TransaksiController::class);
    Route::get('laporans/tanggal/{tanggal_transaksi?}', [LaporanController::class, 'tanggal'])->name('laporans.tanggal');
    Route::get('laporans/print/{tanggal?}', [LaporanController::class, 'print'])->name('laporans.print');

});
