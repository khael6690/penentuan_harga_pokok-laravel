<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WEB\Login;
use App\Http\Controllers\WEB\Admin\Home as HomeAdmin;
use App\Http\Controllers\WEB\Admin\UserController;
use App\Http\Controllers\WEB\Admin\PerusahaanController;
use App\Http\Controllers\WEB\Admin\SatuanController;
use App\Http\Controllers\WEB\Admin\BahanController;
use App\Http\Controllers\WEB\Admin\BiayaBahanBakuController;
use App\Http\Controllers\WEB\Admin\BiayaBahanPenolongController;
use App\Http\Controllers\WEB\Admin\BiayaOverheadTetapController;
use App\Http\Controllers\WEB\Admin\BiayaOverheadVariabelController;
use App\Http\Controllers\WEB\Admin\BiayaTKLangsungController;
use App\Http\Controllers\WEB\Admin\BiayaTKTidakLangsungController;
use App\Http\Controllers\WEB\Admin\ProdukController;
use App\Http\Controllers\WEB\Admin\TenagaKerjaController;
use App\Http\Controllers\WEB\Admin\PelangganController;
use App\Http\Controllers\WEB\Admin\ProduksiController;
use App\Http\Controllers\WEB\Owner\HomeOwner;
use App\Http\Controllers\WEB\Owner\ProduksiOwner;

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
    return redirect('/login');
});

//login
Route::get('/login', [Login::class, 'index']);
Route::post('/logon', [Login::class, 'login']);
Route::get('/logout', [Login::class, 'out']);
Route::post('/changepassword', [Login::class, 'changepassword']);

Route::group(['prefix'=>'admin'], function(){
    //Home
    Route::get('/', [HomeAdmin::class, 'index']);

    //Users
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/table_users', [UserController::class, 'table']);

    //Perusahaan
    Route::get('/perusahaan', [PerusahaanController::class, 'index']);
    Route::get('/table_perusahaan', [PerusahaanController::class, 'table']);

    //Satuan
    Route::get('/satuan', [SatuanController::class, 'index']);
    Route::get('/table_satuan', [SatuanController::class, 'table']);

    //Bahan
    Route::get('/bahan', [BahanController::class, 'index']);
    Route::get('/table_bahan', [BahanController::class, 'table']);

    //Produk
    Route::get('/produk', [ProdukController::class, 'index']);
    Route::get('/table_produk', [ProdukController::class, 'table']);

    //TenagaKerja
    Route::get('/tenaga_kerja', [TenagaKerjaController::class, 'index']);
    Route::get('/table_tenaga_kerja', [TenagaKerjaController::class, 'table']);

    //Pelanggan
    Route::get('/pelanggan', [PelangganController::class, 'index']);
    Route::get('/table_pelanggan', [PelangganController::class, 'table']);

    //Produksi
    Route::get('/produksi/{produksi_id?}', [ProduksiController::class, 'index']);
    Route::get('/table_produksi', [ProduksiController::class, 'table']);

    //Biaya Bahan Baku
    Route::get('/biaya_bahan_baku/{produksi_id?}', [BiayaBahanBakuController::class, 'index']);
    Route::get('/table_biaya_bahan_baku/{produksi_id}', [BiayaBahanBakuController::class, 'table']);

    //Biaya Bahan Penolong
    Route::get('/biaya_bahan_penolong/{produksi_id?}', [BiayaBahanPenolongController::class, 'index']);
    Route::get('/table_biaya_bahan_penolong/{produksi_id}', [BiayaBahanPenolongController::class, 'table']);

    //Biaya Tenaga Kerja Langsung
    Route::get('/biaya_tenaga_kerja_langsung/{produksi_id?}', [BiayaTKLangsungController::class, 'index']);
    Route::get('/table_biaya_tenaga_kerja_langsung/{produksi_id}', [BiayaTKLangsungController::class, 'table']);

    //Biaya Tenaga Kerja Tidak Langsung
    Route::get('/biaya_tenaga_kerja_tidak_langsung/{produksi_id?}', [BiayaTKTidakLangsungController::class, 'index']);
    Route::get('/table_biaya_tenaga_kerja_tidak_langsung/{produksi_id}', [BiayaTKTidakLangsungController::class, 'table']);

    //Biaya Overhead Tetap
    Route::get('/biaya_overhead_tetap/{produksi_id?}', [BiayaOverheadTetapController::class, 'index']);
    Route::get('/table_biaya_overhead_tetap/{produksi_id}', [BiayaOverheadTetapController::class, 'table']);

    //Biaya Overhead Variabel
    Route::get('/biaya_overhead_variabel/{produksi_id?}', [BiayaOverheadVariabelController::class, 'index']);
    Route::get('/table_biaya_overhead_variabel/{produksi_id}', [BiayaOverheadVariabelController::class, 'table']);
});

Route::group(['prefix'=>'owner'], function(){
    //Home
    Route::get('/', [HomeOwner::class, 'index']);

    //Produksi
    Route::get('/produksi/{produksi_id?}', [ProduksiOwner::class, 'index']);
    Route::get('/table_produksi', [ProduksiOwner::class, 'table']);
});
