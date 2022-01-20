<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peminjaman extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'peminjam_id',
        'petugas_id',
        'borrowing_date',
        'returning_date',
        'real_returning_date',
        'status',
    ];

    protected $casts = [
        'borrowing_date' => 'date:d M Y',
        'returning_date' => 'date:d M Y',
        'real_returning_date' => 'date:d M Y'
    ];

    public function detailPinjaman(){
        return $this->hasMany(DetailPeminjaman::class, 'pinjaman_id', 'id');
    }

    public function peminjam(){
        return $this->belongsTo(User::class, 'peminjam_id', 'id');
    }

    public function petugas(){
        return $this->belongsTo(User::class, 'petugas_id', 'id');
    }
}
