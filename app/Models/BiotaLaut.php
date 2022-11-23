<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiotaLaut extends Model
{
    use HasFactory;

    protected $fillable = [
        'kabupaten_kota_id',
        'jenis_biota_laut_id',
        'latitude',
        'longtitude',
        'deskripsi',
        'jumlah_populasi',
        'gambar',
    ];

    public function kabupaten_kota()
    {
        return $this->belongsTo(KabupatenKota::class, 'kabupaten_kota_id', 'id');
    }

    public function jenis_biota_laut()
    {
        return $this->belongsTo(JenisBiotaLaut::class, 'jenis_biota_laut_id', 'id');
    }
}
