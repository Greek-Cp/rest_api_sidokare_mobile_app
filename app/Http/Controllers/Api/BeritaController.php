<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormater;
use App\Http\Controllers\Controller;
use App\Models\berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function getBeritaTerkini(){
        $berita = berita::all();
        return ApiFormater::createApi(200,'Berhasil',$berita);
    }
    public function getBeritaSpesific(Request $request){
        $request -> validate((['id_kategori' => 'required']));
        $kategori_berita = KategoriBerita::where('id_kategori','=',$request->id_kategori)-> first();
        $berita = Berita::where('id_kategori', '=', $kategori_berita['id_kategori'])->get()->values(); // menggunakan method values() untuk mengubah data menjadi array
        return ApiFormater::createApi(200,'Berhasil',$berita);
    }
}
