<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $fillable = [
        'penghuni_id',
        'bulan',
        'tahun',
        'jumlah',
        'status',
        'tanggal_bayar',
    ];

    public function penghuni()
    {
        return $this->belongsTo(Penghuni::class);
    }
}