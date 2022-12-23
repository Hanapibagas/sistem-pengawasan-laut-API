<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenanaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun_id',
        'daerah',
        'kabupaten',
        'jumlah_batang'
    ];

    public function TahunPenanaman()
    {
        return $this->belongsTo(TahunPenanamanMangrove::class, 'tahun_id', 'id');
    }
}
