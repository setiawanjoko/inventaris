<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventaris extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'jenis_id',
        'ruang_id',
        'code',
        'name',
        'condition',
        'description',
        'amount',
        'registered_at'
    ];

    protected $casts = [
        'registered_at' => 'date:d M Y'
    ];

    public function jenis(){
        return $this->belongsTo(Jenis::class, 'jenis_id', 'id');
    }

    public function ruang(){
        return $this->belongsTo(Ruang::class, 'ruang_id', 'id');
    }

    public function detailPeminjaman(){
        return $this->hasMany(DetailPeminjaman::class, 'inventaris_id', 'id');
    }
}
