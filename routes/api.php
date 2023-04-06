<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AkunController;
use App\Http\Controllers\Api\BeritaController;

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

Route::post('akun/register',[AkunController::class,'register']);
Route::post('akun/login',[AkunController::class,'login']);
Route::post('akun/get_otp',[AkunController::class,'getOtp']);
Route::post('akun/verifikasi_akun',[AkunController::class,'verifikasiAccount']);
Route::post('akun/updatePassword',[AkunController::class,'updatePassword']);
Route::get('berita/get_berita',[BeritaController::class,'getBeritaTerkini']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
