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
        'keterangan_transaksi',
    ];
    // protected $guarded = ['id'];
    // public $incrementing = false;
    // protected $keyType = 'string';
    // protected $primaryKey = 'kode_kaskecil';

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         $model->kode_kaskecil = 'KK' . str_pad(static::max('kode_kaskecil') + 1, 4, '0', STR_PAD_LEFT);
    //     });
    // }
    
    
}