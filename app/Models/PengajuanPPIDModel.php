<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanPPIDModel extends Model
{
    use HasFactory;
    public $timestamps = false;


    protected $table = 'pengajuan_ppid';
    protected $fillable = [
        'id_akun',
        'judul_laporan',
        'isi_laporan',
        'asal_pelapor',
        'kategori_ppid',
        'upload_file_pendukung'
    ];

}