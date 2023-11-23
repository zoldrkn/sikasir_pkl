<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetoranModel extends Model
{
    use HasFactory;
    protected $table ='saldo';
    protected $fillable = [
        'tanggal_saldo',
        'keterangan_saldo',
        'saldo',
    ];
    protected $guarded = ['id'];
}