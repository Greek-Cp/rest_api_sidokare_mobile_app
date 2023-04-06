<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormater;
use App\Http\Controllers\Controller;
use App\Models\berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function getBeritaTerkini(){
        $berita = berita::all();
        return ApiFormater::createApi(200,'Berhasil',$berita);
    }
}