<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'biota_laut_id',
        'gambar'
    ];

    public function biota_laut()
    {
        return $this->belongsTo(BiotaLaut::class, 'biota_laut_id', 'id');
    }
}
