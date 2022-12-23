<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunPenanamanMangrove extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun'
    ];

    public function DataPenanaman()
    {
        return $this->hasMany(DataPenanaman::class, 'tahun_id', 'id');
    }
}
