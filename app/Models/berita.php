<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    use HasFactory;

    protected $table = "berita";
    //rubah id_berita => id
    protected $fillable = [
        'id',
        'id_akun', 'tanggal_publikasi', 'id_kategori',
        'isi_berita', 'foto', 'unggah_file_lain'
    ];
}
