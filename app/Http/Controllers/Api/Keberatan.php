<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormater;
use App\Http\Controllers\Controller;
use App\Models\Keberatan_PPID;
use App\Models\PengajuanPPIDModel;
use Illuminate\Http\Request;
use Exception;

class Keberatan extends Controller
{
    public function BuatKeberatanPPID(Request $request)
    {
        try {
            $request->validate([
                'id_akun' => "required",
                "alamat" => "required",
                "alasan" => "required",
                "catatan_tambahan" => "required",
                "id_ppid" => "required"
            ]);
            $pengajuanKeberanPPID = Keberatan_PPID::create([
                "id_akun" => $request->id_akun,
                "alamat" => $request->alamat,
                "alasan" => $request->alasan,
                "catatan_tambahan" => $request->catatan_tambahan,
                "id_ppid" => $request->id_ppid,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $updateStatus = PengajuanPPIDModel::where('id', '=', $request->id_ppid);
            $updateStatus->update(['status' => 'revisi']);

            return ApiFormater::createApi('200', 'succes', [
                'kode' => '404', 'data' => $pengajuanKeberanPPID
            ]);
        } catch (Exception $e) {
            return ApiFormater::createApi('201', 'gagal', [
                'kode' => '404', 'data' => $e->getMessage()
            ]);
        }
    }
}
