<?php

namespace App\Http\Controllers\api;

use App\Helpers\ApiFormater;
use App\Http\Controllers\Controller;
use App\Models\PengajuanPPIDModel;
use Illuminate\Http\Request;

class PengajuanPPIDController extends Controller
{
    //
    public function create_pengajuan(Request $request){
        $request -> validate(
            [
                'id_akun' => 'required',
                'judul_laporan' => 'required',
                'isi_laporan' => 'required',
                'asal_pelapor' => 'required',
                'kategori_ppid' => 'required',
                'upload_file_pendukung' => 'required'
            ]);
            $PengajuanPPID = PengajuanPPIDModel::create([
                'id _akun' => $request-> id_akun
            ,'judul_laporan' => $request-> judul_laporan,
            'isi_laporan' => $request-> isi_laporan,
            'asal_pelapor' => $request-> asal_pelapor,
            'kategori_ppid' => $request -> kategori_ppid,
            'upload_file_pendukung'=> $request-> upload_file_pendukung
            ]
            );
            return ApiFormater::createApi(200,'Succes',['kode'=>'1','data'=> $PengajuanPPID]);
        }

    public function get_pengajuan(){
    $list_ppid = PengajuanPPIDModel::all();
    return ApiFormater::createApi(200,'Berhasil',$list_ppid);
    }
    public function get_pengajuan_by_id(Request $request){
        $request -> validate(['id_akun' => 'required']);
        $list_ppid_by_id = PengajuanPPIDModel::all()-> where('id_akun','=',$request->id_akun);
        return ApiFormater::createApi(200,'Berhasil',$list_ppid_by_id);
    }
}