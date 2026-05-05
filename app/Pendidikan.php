<?php

namespace App; // atau App\Models

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    // PENTING: Kolom yang boleh diisi secara massal harus ditulis di sini
    protected $table = 'pendidikan';
    protected $fillable = [
        'nama',
        'tingkat',
        'tahun_masuk',
        'tahun_keluar',
    ];
}