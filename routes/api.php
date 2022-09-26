<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\JenisBarangController;
use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\TransaksiController;
use App\Http\Controllers\Api\TransaksiBarangController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('jenis_barang', JenisBarangController::class);
Route::resource('barang', BarangController::class);
Route::resource('transaksi', TransaksiController::class);
Route::post('/transaksi_barang', [TransaksiBarangController::class, 'store']);
Route::get('/transaksi_barang/all/{id}', [TransaksiBarangController::class, 'index']);
Route::get('/transaksi_barang/detail/{id}', [TransaksiBarangController::class, 'show']);
Route::delete('/transaksi_barang/delete/{id}', [TransaksiBarangController::class, 'destroy']);