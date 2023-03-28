<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'akun';
    protected $fillable =['email','password',
'password','nik','kata_sandi','konfirmasi_kata_sandi'];
}