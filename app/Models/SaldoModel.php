<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaldoModel extends Model
{
    use HasFactory;
    protected $table = 'saldo';
    protected $fillable = [
        'tanggal_saldo',
        'keterangan_saldo',
        'jumlah_saldo',
    ];
    public static function getTotalSaldo()
    {
        return self::sum('jumlah_saldo');
    }
    protected $guarded = ['id'];

    public static function filterBulan()
    {
        return self::where('Month(tanggal_saldo)');
    }
}