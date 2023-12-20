<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankModel extends Model
{
    use HasFactory;
    protected $table ='bank';
    protected $fillable = [
    'tanggal_setoran',
    'keterangan',
    'setoran_bank',
    ];
    protected $guarded = ['id'];
}
