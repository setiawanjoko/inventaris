<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailPeminjaman extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'peminjaman_id',
        'inventaris_id',
        'amount',
    ];

    public function peminjaman(){
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id', 'id');
    }

    public function inventaris(){
        return $this->belongsTo(Inventaris::class, 'inventaris_id', 'id');
    }
}
