<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keberatan_PPID extends Model
{
    use HasFactory;

    protected $table = 'keberatan_ppid';

    protected $fillable = ['id_akun', 'alamat', 'alasan', 'catatan_tambahan', 'id_ppid'];
}
