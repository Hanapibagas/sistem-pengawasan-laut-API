<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis'
    ];

    public function GeoJenis()
    {
        return $this->hasMany(GeoJenis::class, 'jenis_id', 'id');
    }
}
