<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryawanModel extends Model
{
    use HasFactory;
    protected $table ='karyawan';
    protected $fillable = [
        'nama_karyawan',
        'divisi',
    ];
    protected $guarded = ['id'];

    public function transaksi_relasi()
    {
        return $this->hasMany(TransaksiModel::class);
    }

}