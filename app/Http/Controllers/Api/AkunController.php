<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormater;
use App\Http\Controllers\Controller;
use App\Models\Akun;
use Exception;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function login(
        Request $request
    ) {
        $request->validate(['email' => 'required', 'password' => 'required']);
        $akun = Akun::where('email', '=', $request->email)->first();
        if ($akun) {
            $status = [
                'status_login' => 1,
                'pesan' => 'Berhasil Login',
                'akun' => $akun
            ];
            return ApiFormater::createApi(200, 'Sukses', $status);
        } else {
            $status = [
                'status_login' => '0',
                'pesan' => 'Gagal'
            ];
            return ApiFormater::createApi(400, 'Akun Tidak Ditemukan', $status);
        }
    }

    public function checkEmail(
        Request $request
    ) {
        $request->validate(['email' => 'required']);
        $akun = Akun::where('email', '=', $request->email)->exists();
        if ($akun == 1) {
            return ApiFormater::createApi(200, "Berhasil", ['Kode' => "1", "Pesan" => "akun telah ada"]);
        } else {
            return ApiFormater::createApi(400, "Berhasil", ['Kode' => "1", "Pesan" => "akun telah ada"]);
        }
    }

    public function getOtp(Request $request)
    {
        try {
            $request->validate(['email' => 'required']);
            $dataAccount = Akun::where('email', '=', $request->email)->first();
            if ($dataAccount) {
                $status = [
                    'pesan' => 'Mengambil Kode Otp Berhasil',
                    'kode_otp' => $dataAccount['otp']
                ];
                return ApiFormater::createApi(200, 'Sukses', $status);
            } else {
                $status = [
                    'pesan' => 'Mengambil Kode Otp Gagal',
                ];
                return ApiFormater::createApi(400, 'Gagal', $status);
            }
        } catch (Exception $e) {
        }
    }
    public function verifikasiAccount(Request $request)
    {
        try {

            $request->validate(['email' => 'required',]);
            $dataAccount = Akun::where('email', '=', $request->email);
            $dataAccount->update(['status_verif' => '1']);
            if ($dataAccount) {
                $status = ['pesan' => 'Verifikasi Akun Berhasil', 'kode' => '1'];
                return ApiFormater::createApi(200, 'Sukses', $status);
            } else {
                $status = ['pesan' => 'Akun tidak ditemukan', 'kode' => '0'];
                return ApiFormater::createApi(404, 'Gagal', $status);
            }
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function updatePassword(Request $request)
    {
        try {
            $request->validate(['email' => 'required', 'password' => 'required']);
            $data = Akun::where('email', '=', $request->email);
            $checkAcc = Akun::where('email', '=', $request->email)->exists();

            // echo $checkAcc . ":" . $request->email;
            if ($checkAcc == 1) {
                $data->update(['password' => $request->password]);
                if ($data) {
                    $status = ['pesan' => 'Ubah Sandi Berhasil', 'kode' => '1'];
                    return ApiFormater::createApi(200, 'Sukses', $status);
                } else {
                    $status = ['pesan' => 'Ubah Sandi Gagal', 'kode' => '0'];
                    return ApiFormater::createApi(404, 'Not Found', $status);
                }
            } else {
                $status = ['pesan' => 'Ubah Sandi Gagal', 'kode' => '0'];
                return ApiFormater::createApi(404, 'Not Found', $status);
            }
        } catch (Exception $e) {
            echo $e;
        }
    }
    public function register(Request $request)
    {
        try {

            $request->validate([
                'email' => 'required',
                'username' => 'required',
                'nomor_telepon' => 'required',
                'password' => 'required',
                'role' => 'required',
                'otp' => 'required',
                'nama' => 'required'
            ]);
            $checkDataExists = Akun::where('email', '=', $request->email)->exists();

            if ($checkDataExists != 1) {
                $akun = Akun::create(
                    [
                        'email' => $request->email,
                        'username' => $request->username,
                        'nomor_telepon' => $request->nomor_telepon,
                        'password' => $request->password,
                        'role' => $request->role,
                        'otp' => $request->otp,
                        'nama' => $request->nama
                    ]
                );
                $data = Akun::where('id_akun', '=', $akun->id)->get();
                if ($data) {
                    return ApiFormater::createApi(200, 'Succes', $data);
                } else {
                    return ApiFormater::createApi(400, 'Failed', $data);
                }
            } else {
                return ApiFormater::createApi(400, 'Akun Telah Ada', ['pesan', 'akun telah terdaftar']);
            }
        } catch (Exception $e) {
            return ApiFormater::createApi(400, 'Failed', $e);
        }
    }
    //
}
