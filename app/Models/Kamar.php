<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamar';

    protected $fillable = [
        'nomor_kamar',
        'tipe',
        'harga_per_bulan',
        'status',
        'fasilitas',
    ];

    public function penghuni()
    {
        return $this->hasMany(Penghuni::class);
    }
}