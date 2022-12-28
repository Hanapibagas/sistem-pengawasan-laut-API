<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeoJenis extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_id', 'deskripsi', 'nama_geo', 'di_perbolehkan', 'tidak_diperbolehkan', 'diperbolehkan_bersyarat'
    ];

    public function Jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id', 'id');
    }
}
