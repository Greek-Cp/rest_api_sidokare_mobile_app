<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AkunController;
use App\Http\Controllers\Api\BeritaController;
use App\Http\Controllers\Api\PengajuanAspirasiController;
use App\Http\Controllers\Api\PengajuanKeluhan;
use App\Http\Controllers\Api\PengajuanKeluhanController;
use App\Http\Controllers\api\PengajuanPPIDController;
use App\Models\PengajuanAspirasi;

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

Route::post('akun/register', [AkunController::class, 'register']);
Route::post('akun/login', [AkunController::class, 'login']);
Route::post('akun/get_otp', [AkunController::class, 'getOtp']);
Route::post('akun/verifikasi_akun', [AkunController::class, 'verifikasiAccount']);
Route::post('akun/updatePassword', [AkunController::class, 'updatePassword']);
Route::get('berita/get_berita', [BeritaController::class, 'getBeritaTerkini']);
Route::post('berita/specific_berita', [BeritaController::class, 'getBeritaSpesific']);
//ppid
Route::post('pengajuan/ppid', [PengajuanPPIDController::class, 'create_pengajuan']);
Route::post('pengajuan/uploadfileppid', [PengajuanPPIDController::class, 'upload_file_ppid']);
Route::get('pengajuan/getpengajuan', [PengajuanPPIDController::class, 'get_pengajuan']);
//keluhan
Route::post('pengajuan/keluhan', [PengajuanKeluhanController::class, 'buat_keluhan']);
Route::get('pengajuan/getpengajuan_keluhan', [PengajuanKeluhanController::class, 'get_pengajuan_keluhan']);
Route::post('pengajuan/getpengajuan_keluhan_byid', [PengajuanKeluhanController::class, 'get_pengajuan_keluhan_by_id']);
//aspirasi
Route::post('pengajuan/aspirasi', [PengajuanAspirasiController::class, 'buat_aspirasi']);
Route::get('pengajuan/get_pengajuan_aspirasi', [PengajuanAspirasiController::class, 'get_aspirasi']);
Route::get('pengajuan/get_pengajuan_aspirasi_byid', [PengajuanAspirasiController::class, 'get_aspirasi_by_id']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
