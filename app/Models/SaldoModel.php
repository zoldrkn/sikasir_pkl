<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaldoModel extends Model
{
    use HasFactory;
    protected $table ='saldo';
    protected $fillable = [
        'tanggal_saldo',
        'keterangan_saldo',
        'jumlah_saldo',
    ];
    protected $guarded = ['id'];
}