<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\TransaksiobatController;
use App\Http\Controllers\AsuransiController;
use App\Http\Controllers\Auth\LogoutController;
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

Route::get('/forget-password', [LogoutController::class, 'forget_password']);
Route::post('/store-reset', [LogoutController::class, 'store_reset']);
Route::group(['middleware' => 'auth'], function() {
    /**
    * Logout Route
    */
    Route::get('/logout-perform', [LogoutController::class, 'perform'])->name('logout.perform');
    
 });

Route::group(['middleware' => 'auth','prefix' => 'user'],function(){
    Route::get('/', [UserController::class, 'index']);
    Route::get('/view', [UserController::class, 'view']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/modal', [UserController::class, 'modal']);
    Route::get('/switch_status', [UserController::class, 'switch_status']);
    Route::get('/delete', [UserController::class, 'delete_data']);
    Route::get('/getdata', [UserController::class, 'get_data']);
});
Route::group(['middleware' => 'auth','prefix' => 'master/obat'],function(){
    Route::get('/', [ObatController::class, 'index']);
    Route::get('/view', [ObatController::class, 'view']);
    Route::post('/', [ObatController::class, 'store']);
    Route::get('/modal', [ObatController::class, 'modal']);
    Route::get('/switch_status', [ObatController::class, 'switch_status']);
    Route::get('/delete', [ObatController::class, 'delete_data']);
    Route::get('/getdata', [ObatController::class, 'get_data']);
});
Route::group(['middleware' => 'auth','prefix' => 'master/poli'],function(){
    Route::get('/', [PoliController::class, 'index']);
    Route::get('/view', [PoliController::class, 'view']);
    Route::post('/', [PoliController::class, 'store']);
    Route::get('/modal', [PoliController::class, 'modal']);
    Route::get('/switch_status', [PoliController::class, 'switch_status']);
    Route::get('/delete', [PoliController::class, 'delete_data']);
    Route::get('/getdata', [PoliController::class, 'get_data']);
});
Route::group(['middleware' => 'auth','prefix' => 'master/dokter'],function(){
    Route::get('/', [DokterController::class, 'index']);
    Route::get('/view', [DokterController::class, 'view']);
    Route::post('/', [DokterController::class, 'store']);
    Route::get('/modal', [DokterController::class, 'modal']);
    Route::get('/switch_status', [DokterController::class, 'switch_status']);
    Route::get('/delete', [DokterController::class, 'delete_data']);
    Route::get('/getdata', [DokterController::class, 'get_data']);
});
Route::group(['middleware' => 'auth','prefix' => 'master/asuransi'],function(){
    Route::get('/', [AsuransiController::class, 'index']);
    Route::get('/view', [AsuransiController::class, 'view']);
    Route::post('/', [AsuransiController::class, 'store']);
    Route::get('/modal', [AsuransiController::class, 'modal']);
    Route::get('/switch_status', [AsuransiController::class, 'switch_status']);
    Route::get('/delete', [AsuransiController::class, 'delete_data']);
    Route::get('/getdata', [AsuransiController::class, 'get_data']);
});
Route::group(['middleware' => 'auth','prefix' => 'transaksiobat'],function(){
    Route::get('/', [TransaksiobatController::class, 'index']);
    Route::get('/persediaan', [TransaksiobatController::class, 'index_persediaan']);
    Route::get('/viewpersediaan', [TransaksiobatController::class, 'view_persediaan']);
    Route::get('/view', [TransaksiobatController::class, 'view']);
    Route::post('/', [TransaksiobatController::class, 'store']);
    Route::post('/obat', [TransaksiobatController::class, 'store_obat']);
    Route::post('/publish', [TransaksiobatController::class, 'store_publish']);
    Route::get('/modal', [TransaksiobatController::class, 'modal']);
    Route::get('/modal_stok', [TransaksiobatController::class, 'modal_stok']);
    Route::get('/switch_status', [TransaksiobatController::class, 'switch_status']);
    Route::get('/delete', [TransaksiobatController::class, 'delete_data']);
    Route::get('/delete_detail', [TransaksiobatController::class, 'delete_detail']);
    Route::get('/getdata', [TransaksiobatController::class, 'get_data']);
    Route::get('/getdatapersediaan', [TransaksiobatController::class, 'get_data_persediaan']);
    Route::get('/getdataobat', [TransaksiobatController::class, 'get_data_obat']);
});


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
