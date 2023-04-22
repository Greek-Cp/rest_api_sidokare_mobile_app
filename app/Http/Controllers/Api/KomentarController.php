<?php

namespace App\Http\Controllers\api;

use App\Helpers\ApiFormater;
use App\Http\Controllers\Controller;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KomentarController extends Controller
{

    public function getListKomentarById(Request $request)
    {
        // $data = $request->validate(['id_berita' => 'required']);
        $request->validate(['id_berita' => 'required']);
        // $dataKomentar = Komentar::all()->where('id_berita', '=', $data['id_berita'])->values();
        $berita = DB::table('komentar_berita')->join('akun', 'komentar_berita.id_akun', '=', 'akun.id_akun')->select('komentar_berita.*', 'akun.nama', 'akun.profile_img')->where('komentar_berita.id_berita', '=', $request->id_berita)->get()->values();
        return ApiFormater::createApi(200, "sukses", $berita);
    }
    public function buatKomentarById(Request $request)
    {
        $request->validate([
            'id_berita' => 'required',
            'id_akun' => 'required',
            'isi_komentar' => 'required',
            'waktu_berkomentar' => 'required'
        ]);
        $komentar = Komentar::create([
            'id_akun' => $request->id_akun,
            'id_berita' => $request->id_berita,
            'isi_komentar' => $request->isi_komentar,
            'waktu_berkomentar' => $request->waktu_berkomentar
        ]);
        return ApiFormater::createApi(200, "Succes", $komentar);
    }
}
