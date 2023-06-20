<?php

use App\Http\Controllers\MahasiswaContrller;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MakulController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/product',[ProductController::class,'index']);

//Route::get('/getData',[MahasiswaContrller::class, 'getData']);
Route::post('/login', [MahasiswaContrller::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    // Mahasiswa route
    Route::post('/mahasiswa/create',[MahasiswaContrller::class, 'create']);
    Route::get('/getData',[MahasiswaContrller::class, 'getData']);
    Route::get('/mahasiswa', [MahasiswaContrller::class, 'index']);
    Route::get('/mahasiswa/read/{nim}', [MahasiswaContrller::class, 'show']);
    #Route::post('/mahasiswa/create', [MahasiswaContrller::class, 'store']);
    Route::put('/mahasiswa/update/{nim}', [MahasiswaContrller::class, 'update']);
    Route::delete('/mahasiswa/delete/{nim}', [MahasiswaContrller::class, 'destroy']);
    // Dosen route
    Route::get('/dosen', [DosenController::class, 'index']);
    Route::get('/dosen/read/{id}', [DosenController::class, 'show']);
    Route::post('/dosen/create', [DosenController::class, 'store']);
    Route::put('/dosen/update/{id}', [DosenController::class, 'update']);
    Route::delete('/dosen/delete/{id}', [DosenController::class, 'destroy']);
    // Makul route
    Route::get('/makul', [MakulController::class, 'index']);
    Route::get('/makul/read/{id}', [MakulController::class, 'show']);
    Route::post('/makul/create', [MakulController::class, 'store']);
    Route::put('/makul/update/{id}', [MakulController::class, 'update']);
    Route::delete('/makul/delete/{id}', [MakulController::class, 'destroy']);
});