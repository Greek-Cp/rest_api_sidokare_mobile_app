<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormater;
use App\Http\Controllers\Controller;
use App\Models\PengajuanKeluhan;
use Illuminate\Http\Request;

class PengajuanKeluhanController extends Controller
{
    public function buat_keluhan(Request $request)
    {
        $request->validate([
            'id_akun' => 'required',
            'judul_laporan' => 'required',
            'isi_laporan' => 'required',
            'asal_pelapor' => 'required',
            'lokasi_kejadian' => 'required',
            'kategori_laporan' => 'required',
            'tanggal_kejadian' => 'required',
            'upload_file_pendukung' => 'required'
        ]);
        $pengajuanKeluhan = PengajuanKeluhan::create([
            'id_akun' => $request->id_akun,
            'judul_laporan' => $request->judul_laporan,
            'isi_laporan' => $request->isi_laporan,
            'asal_pelapor' => $request->asal_pelapor,
            'lokasi_kejadian' => $request->lokasi_kejadian,
            'kategori_laporan' => $request->kategori_laporan,
            'tanggal_kejadian' => $request->tanggal_kejadian,
            'upload_file_pendukung' => $request->upload_file_pendukung
        ]);
        return ApiFormater::createApi(200, 'Succeas', [
            'kode' => '1',
            'data' => $pengajuanKeluhan
        ]);
    }
    public function get_pengajuan_keluhan()
    {
        $list_ppid = PengajuanKeluhan::all();
        return ApiFormater::createApi(200, 'Berhasil', $list_ppid);
    }
    public function get_pengajuan_keluhan_by_id(Request $request)
    {
        $request->validate(['id_akun' => 'required']);
        $list_ppid_by_id = PengajuanKeluhan::all()->where('id_akun', '=', $request->id_akun);
        return ApiFormater::createApi(200, 'Berhasil', $list_ppid_by_id);
    }
}
