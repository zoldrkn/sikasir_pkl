<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganModel extends Model
{
    use HasFactory;
    protected $table = 'keterangan';
    protected $fillable = [
        'transaksi_kaskecil_id',
        'ket1',
        'ket2',
        'ket3',
        'ket4',
        'nominal1',
        'nominal2',
        'nominal3',
        'nominal4',
        'lainnya',
        'nominal_lainnya',
    ];

    public function transaksi_relasi()
    {
        return $this->belongsTo(TransaksiModel::class, 'transaksi_kaskecil_id');
    }
}