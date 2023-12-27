<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class TransaksiModel extends Model
{
    use HasFactory;
    protected $table = 'transaksi_kaskecil';
    protected $fillable = [
        'kode_kaskeluar',
        'jumlah_keluar',
        'jumlah_masuk',
        'tanggal_transaksi',
        'tanggal_masuk',
        'keterangan_transaksi',
        'karyawan_id',
    ];

    protected $attributes = [
        'karyawan_id' => 1, // Ganti dengan nilai default yang sesuai
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

    // Di dalam model TransaksiModel
    public function karyawan_relasi()
    {
        return $this->belongsTo(KaryawanModel::class, 'karyawan_id');
    }

    public function transaksi_relasi()
    {
        return $this->hasOne(KeteranganModel::class, 'transaksi_kaskecil_id');
    }
    
    public static function rules($id = null)
    {
        return [
            'kode_kaskeluar' => [
                'required',
                Rule::unique('transaksi_kaskecil', 'kode_kaskeluar')->ignore($id),
            ],
            // Aturan validasi lainnya
        ];
    }

}