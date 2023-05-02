<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AkunController;
use App\Http\Controllers\Api\BeritaController;
use App\Http\Controllers\Api\JumlahLaporan;
use App\Http\Controllers\api\KomentarController;
use App\Http\Controllers\Api\PengajuanAspirasiController;
use App\Http\Controllers\Api\PengajuanKeluhan;
use App\Http\Controllers\Api\PengajuanKeluhanController;
use App\Http\Controllers\api\PengajuanPPIDController;
use App\Http\Controllers\api\ProfileController;
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
Route::post('akun/getDetailAkun', [AkunController::class, 'DetailAkun']);
Route::post('akun/get_otp', [AkunController::class, 'getOtp']);
Route::post('akun/verifikasi_akun', [AkunController::class, 'verifikasiAccount']);
Route::post('akun/chekEmail', [AkunController::class, 'checkEmail']);
Route::post('akun/updatePassword', [AkunController::class, 'updatePassword']);
Route::get('berita/get_berita', [BeritaController::class, 'getBeritaTerkini']);
Route::get('berita/specific_berita2', [BeritaController::class, 'getBeritaModif2']);
Route::get('berita/specific_berita3', [BeritaController::class, 'getBeritaModif3']);

Route::post('berita/specific_berita', [BeritaController::class, 'getBeritaSpesific']);
//ppid
Route::post('pengajuan/ppid', [PengajuanPPIDController::class, 'create_pengajuan']);
Route::post('pengajuan/uploadfileppid', [PengajuanPPIDController::class, 'upload_file_ppid']);
Route::get('pengajuan/getpengajuan', [PengajuanPPIDController::class, 'get_pengajuan']);
Route::post('pengajuan/getpengajuan_byid', [PengajuanPPIDController::class, 'get_pengajuan_by_id']);

//keluhan
Route::post('pengajuan/keluhan', [PengajuanKeluhanController::class, 'buat_keluhan']);
Route::post('pengajuan/uploadfilekeluhan', [PengajuanKeluhanController::class, 'upload_file_keluhan']);
Route::get('pengajuan/getpengajuan_keluhan', [PengajuanKeluhanController::class, 'get_pengajuan_keluhan']);
Route::post('pengajuan/getpengajuan_keluhan_byid', [PengajuanKeluhanController::class, 'get_pengajuan_keluhan_by_id']);
//aspirasi
Route::post('pengajuan/aspirasi', [PengajuanAspirasiController::class, 'buat_aspirasi']);
Route::post('pengajuan/uploadfileaspirasi', [PengajuanAspirasiController::class, 'upload_file_aspirasi']);
Route::get('pengajuan/get_pengajuan_aspirasi', [PengajuanAspirasiController::class, 'get_aspirasi']);
Route::post('pengajuan/get_pengajuan_aspirasi_byid', [PengajuanAspirasiController::class, 'get_aspirasi_by_id']);

Route::get('jumlahLaporan/Jumlahhnya', [JumlahLaporan::class, 'CountTable']);

Route::post('komentar/getkomentar', [KomentarController::class, 'getListKomentarById']);

Route::post('komentar/buatkomentar', [KomentarController::class, 'buatKomentarById']);

Route::post('Profile/UpdateDelete', [ProfileController::class, 'DeleteUpdateFile']);
Route::post('Profile/UpdateDataSaja', [ProfileController::class, 'UpdateDataSaja']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});