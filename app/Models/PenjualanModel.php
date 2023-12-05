<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanModel extends Model
{
    use HasFactory;
    protected $table ='penjualan';
    protected $fillable = [
    'tanggal_penjualan',
    'setoran_penjualan',
    'keterangan_penjualan',
    'pembayaran',
    ];
    protected $guarded = ['id'];
}
