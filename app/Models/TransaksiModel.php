<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    use HasFactory;
    protected $table ='transaksi_kas_kecil';
    protected $fillable = [
        'jumlah_keluar',
        'jumlah_masuk',
        'tanggal_tansaksi',
        'keterangan',
    ];
    protected $guarded = ['id'];
}