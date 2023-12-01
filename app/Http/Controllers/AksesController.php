<?php

namespace App\Http\Controllers;
use App\Models\SaldoModel;
use App\Models\TransaksiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AksesController extends Controller
{
    function index()
    { 
        $totalKeluar = TransaksiModel::getTotalKeluar();
        $totalMasuk = TransaksiModel::getTotalMasuk();
        $totalSaldo = SaldoModel::getTotalSaldo();
        $totalMasuk = TransaksiModel::getTotalMasuk();
        // Menghitung saldo setelah dikurangi jumlah keluar
        $saldoAkhir = ($totalSaldo - $totalKeluar) + $totalMasuk;
        return view('admin.dashboard', ['saldoAkhir' => $saldoAkhir, 'totalKeluar' => $totalKeluar, 'totalMasuk' => $totalMasuk]);
    }
    
    function admin()
    {
        $totalKeluar = TransaksiModel::getTotalKeluar();
        $totalMasuk = TransaksiModel::getTotalMasuk();
        $totalSaldo = SaldoModel::getTotalSaldo();
        $totalMasuk = TransaksiModel::getTotalMasuk();
        // Menghitung saldo setelah dikurangi jumlah keluar
        $saldoAkhir = ($totalSaldo - $totalKeluar) + $totalMasuk;
        return view('admin.dashboard', ['saldoAkhir' => $saldoAkhir, 'totalKeluar' => $totalKeluar, 'totalMasuk' => $totalMasuk]);
    }
    function kasir()
    {
        $totalKeluar = TransaksiModel::getTotalKeluar();
        $totalMasuk = TransaksiModel::getTotalMasuk();
        $totalSaldo = SaldoModel::getTotalSaldo();
        $totalMasuk = TransaksiModel::getTotalMasuk();
        // Menghitung saldo setelah dikurangi jumlah keluar
        $saldoAkhir = ($totalSaldo - $totalKeluar) + $totalMasuk;
        return view('admin.dashboard', ['saldoAkhir' => $saldoAkhir, 'totalKeluar' => $totalKeluar, 'totalMasuk' => $totalMasuk]);
    }
}