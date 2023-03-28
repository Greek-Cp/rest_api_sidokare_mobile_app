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
    ){
        $request -> validate(['email'=>'required','password'=>'required']);
        $akun = Akun::where('email','=',$request-> email)-> first();
        if($akun){
            $status =['status_login' => 1,
            'pesan' => 'Berhasil Login' ,
            'akun' => $akun];
            return ApiFormater::createApi(200,'Sukses',$status);
        } else{
            $status = [
                'status_login' => '0',
                'pesan' => 'Gagal'
            ];
            return ApiFormater::createApi(400,'Akun Tidak Ditemukan',$status);
        }
    }

    public function register(Request $request){
        try{

            $request -> validate([
                'email' => 'required',
                'password' => 'required',
                'nik' => 'required',
                'kata_sandi' => 'required',
                'konfirmasi_kata_sandi' => 'required',
            ]);
            $akun = Akun::create(
                ['email' => $request -> email,
                'password'=> $request-> password,
                'nik' => $request-> nik,
                'kata_sandi'=> $request-> kata_sandi,
                'konfirmasi_kata_sandi'=>$request-> konfirmasi_kata_sandi]
            );
            $data = Akun::where('id_akun','=',$akun->id) -> get();
            if($data){
                return ApiFormater::createApi(200,'Succes',$data);
            } else{

                return ApiFormater::createApi(400,'Failed',$data);
            }
        } catch(Exception $e){
            return ApiFormater::createApi(400,'Failed',$e);

        }
    }
    //
}