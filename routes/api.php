<?php

use App\Http\Controllers\API\BahanAPI;
use App\Http\Controllers\API\BiayaBahanBakuAPI;
use App\Http\Controllers\API\BiayaBahanPenolongAPI;
use App\Http\Controllers\API\BiayaOverhedTetapAPI;
use App\Http\Controllers\API\BiayaOverhedVariabelAPI;
use App\Http\Controllers\API\BiayaTKLangsungAPI;
use App\Http\Controllers\API\BiayaTKTidakLangsungAPI;
use App\Http\Controllers\API\PelangganAPI;
use App\Http\Controllers\API\PerusahaanAPI;
use App\Http\Controllers\API\ProdukAPI;
use App\Http\Controllers\API\ProduksiAPI;
use App\Http\Controllers\API\SatuanAPI;
use App\Http\Controllers\API\TenagaKerjaAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

#Perusahaan
Route::post('/perusahaan/create', [PerusahaanAPI::class, 'create']);

#Bahan
Route::group(['prefix'=>'bahan'], function(){
    Route::post('/create', [BahanAPI::class, 'create']);
    Route::get('/show/{id}', [BahanAPI::class, 'show']);
    Route::post('/update/{id}', [BahanAPI::class, 'update']);
    Route::delete('/delete/{id}', [BahanAPI::class, 'delete']);
});

#Satuan
Route::group(['prefix'=>'satuan'], function(){
    Route::post('/create', [SatuanAPI::class, 'create']);
    Route::get('/show/{id}', [SatuanAPI::class, 'show']);
    Route::post('/update/{id}', [SatuanAPI::class, 'update']);
    Route::delete('/delete/{id}', [SatuanAPI::class, 'delete']);
});

#produk
Route::group(['prefix'=>'produk'], function(){
    Route::post('/create', [ProdukAPI::class, 'create']);
    Route::get('/show/{id}', [ProdukAPI::class, 'show']);
    Route::post('/update/{id}', [ProdukAPI::class, 'update']);
    Route::delete('/delete/{id}', [ProdukAPI::class, 'delete']);
});

#Tenaga Kerja
Route::group(['prefix'=>'tenaga_kerja'], function(){
    Route::post('/create', [TenagaKerjaAPI::class, 'create']);
    Route::get('/show/{id}', [TenagaKerjaAPI::class, 'show']);
    Route::post('/update/{id}', [TenagaKerjaAPI::class, 'update']);
    Route::delete('/delete/{id}', [TenagaKerjaAPI::class, 'delete']);
});

#Pelanggan
Route::group(['prefix'=>'pelanggan'], function(){
    Route::post('/create', [PelangganAPI::class, 'create']);
    Route::get('/show/{id}', [PelangganAPI::class, 'show']);
    Route::post('/update/{id}', [PelangganAPI::class, 'update']);
    Route::delete('/delete/{id}', [PelangganAPI::class, 'delete']);
});

#Produksi
Route::group(['prefix'=>'produksi'], function(){
    Route::post('/create', [ProduksiAPI::class, 'create']);
    Route::get('/show/{id}', [ProduksiAPI::class, 'show']);
    Route::post('/update/{id}', [ProduksiAPI::class, 'update']);
    Route::delete('/delete/{id}', [ProduksiAPI::class, 'delete']);
});

#Biaya Bahan Baku
Route::group(['prefix'=>'biaya_bahan_baku'], function(){
    Route::post('/create/{produksi_id}', [BiayaBahanBakuAPI::class, 'create']);
    Route::get('/show/{id}', [BiayaBahanBakuAPI::class, 'show']);
    Route::post('/update/{id}', [BiayaBahanBakuAPI::class, 'update']);
    Route::delete('/delete/{id}', [BiayaBahanBakuAPI::class, 'delete']);
});

#Biaya Bahan Penolong
Route::group(['prefix'=>'biaya_bahan_penolong'], function(){
    Route::post('/create/{produksi_id}', [BiayaBahanPenolongAPI::class, 'create']);
    Route::get('/show/{id}', [BiayaBahanPenolongAPI::class, 'show']);
    Route::post('/update/{id}', [BiayaBahanPenolongAPI::class, 'update']);
    Route::delete('/delete/{id}', [BiayaBahanPenolongAPI::class, 'delete']);
});

#Biaya Tenaga Kerja Langsung
Route::group(['prefix'=>'biaya_tenaga_kerja_langsung'], function(){
    Route::post('/create/{produksi_id}', [BiayaTKLangsungAPI::class, 'create']);
    Route::get('/show/{id}', [BiayaTKLangsungAPI::class, 'show']);
    Route::post('/update/{id}', [BiayaTKLangsungAPI::class, 'update']);
    Route::delete('/delete/{id}', [BiayaTKLangsungAPI::class, 'delete']);
});

#Biaya Tenaga Kerja Tidak Langsung
Route::group(['prefix'=>'biaya_tenaga_kerja_tidak_langsung'], function(){
    Route::post('/create/{produksi_id}', [BiayaTKTidakLangsungAPI::class, 'create']);
    Route::get('/show/{id}', [BiayaTKTidakLangsungAPI::class, 'show']);
    Route::post('/update/{id}', [BiayaTKTidakLangsungAPI::class, 'update']);
    Route::delete('/delete/{id}', [BiayaTKTidakLangsungAPI::class, 'delete']);
});

#Biaya Overhead Tetap
Route::group(['prefix'=>'biaya_overhead_tetap'], function(){
    Route::post('/create/{produksi_id}', [BiayaOverhedTetapAPI::class, 'create']);
    Route::get('/show/{id}', [BiayaOverhedTetapAPI::class, 'show']);
    Route::post('/update/{id}', [BiayaOverhedTetapAPI::class, 'update']);
    Route::delete('/delete/{id}', [BiayaOverhedTetapAPI::class, 'delete']);
});

#Biaya Overhead Variabel
Route::group(['prefix'=>'biaya_overhead_variabel'], function(){
    Route::post('/create/{produksi_id}', [BiayaOverhedVariabelAPI::class, 'create']);
    Route::get('/show/{id}', [BiayaOverhedVariabelAPI::class, 'show']);
    Route::post('/update/{id}', [BiayaOverhedVariabelAPI::class, 'update']);
    Route::delete('/delete/{id}', [BiayaOverhedVariabelAPI::class, 'delete']);
});
