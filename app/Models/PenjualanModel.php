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
    'keterangan',
    'pembayaran',
    'setoran_penjualan',
    ];

    public static function getTotalPenjualan()
    {
        return self::sum('setoran_penjualan');
    }
    
    public static function filterBulan()
    {
        return self::where('Month(tanggal_penjualan)');
    }

    protected $guarded = ['id'];
}
