<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
    use HasFactory;

    protected $table = 'penghuni';

    protected $fillable = [
        'kamar_id',
        'nama',
        'nik',
        'no_telepon',
        'alamat_asal',
        'tanggal_masuk',
        'tanggal_keluar',
        'status',
    ];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }
}