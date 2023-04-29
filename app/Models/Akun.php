<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'akun';
    protected $fillable = [
        'id_akun', 'nama', 'nik',
        'email',
        'password',
        'nomor_telepon',
        'role',
        'otp', 'status_verif'
    ];
}
