<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KabupatenKota extends Model
{
    use HasFactory;

    protected $fillable = [
        'kabupaten_kota'
    ];

    public function biota_laut()
    {
        return $this->belongsTo(BiotaLaut::class, 'kabupaten_kota_id', 'id');
    }
}
