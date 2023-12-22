<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    use HasFactory;
    protected $table ='transaksi_kaskecil';
    protected $fillable = [
        'kode_kaskeluar',
        'jumlah_keluar',
        'jumlah_masuk',
        'tanggal_transaksi',
        'tanggal_masuk',
        'keterangan_transaksi',
    ];
    
    public static function getTotalKeluar()
    {
        return self::sum('jumlah_keluar');
    }
    
    public static function getTotalMasuk()
    {
        return self::sum('jumlah_masuk');
    }
    
    public static function filterBulan()
    {
        return self::where('Month(tanggal_transaksi)');
    }
    
}