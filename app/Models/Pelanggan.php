<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nik',
        'nama_lengkap',
        'jenis_kelamin',
        'alamat',
        'no_tlp',
    ];
}
