<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aquarium extends Model
{
    // 🔥 FIX ERROR
    protected $table = 'aquariums';

    protected $fillable = [
        'nama_aquarium',
        'ukuran',
        'lokasi',
        'deskripsi',
    ];

    public function ikans()
    {
        return $this->hasMany(\App\Models\Ikan::class);
    }
}