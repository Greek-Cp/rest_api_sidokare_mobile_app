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
                'username' => 'required',
                'nomor_telepon' => 'required',
                'password' => 'required',
                'role' => 'required'
            ]);
            $checkDataExists = Akun::where('email','=',$request->email) -> exists();

            if($checkDataExists != 1){
                $akun = Akun::create(
                    ['email' => $request -> email,
                    'username'=> $request-> username,
                    'nomor_telepon' => $request-> nomor_telepon,
                    'password'=> $request-> password,
                    'role'=>$request-> role]
            );
                $data = Akun::where('id_akun','=',$akun->id) -> get();
                if($data){
                    return ApiFormater::createApi(200,'Succes',$data);
                } else{
                    return ApiFormater::createApi(400,'Failed',$data);
                }


            } else{
                return ApiFormater::createApi(400,'Akun Telah Ada',['pesan','akun telah terdaftar']);
            }
        } catch(Exception $e){
            return ApiFormater::createApi(400,'Failed',$e);

        }
    }
    //
}
