<?php

namespace App; 

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'pendidikan';
    protected $primaryKey = 'id';
    protected $fillable = [
    'nama', 'tingkat', 'tahun_masuk', 'tahun_keluar'
];
}