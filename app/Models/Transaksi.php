<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pelanggan',
        'id_gedung',
        'tanggal',
        'jam_masuk',
        'jumlah_jam',
        'total_pembayaran',
        'keterangan',
    ];

    public function pelanggans()
    {
        return $this->belongsTo('App\Models\Pelanggan', 'id_pelanggan', 'id');
    }
    public function gedungs()
    {
        return $this->belongsTo('App\Models\Gedung', 'id_gedung', 'id');
    }
}
