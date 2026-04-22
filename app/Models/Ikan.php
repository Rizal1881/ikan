<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ikan extends Model
{
    protected $fillable = [
        'nama_ikan',
        'jenis',
        'jumlah',
        'deskripsi',
        'gambar',
    ];
}