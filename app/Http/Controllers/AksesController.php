<?php

namespace App\Http\Controllers;
use App\Models\BankModel;
use App\Models\SaldoModel;
use Illuminate\Http\Request;
use App\Models\PenjualanModel;
use App\Models\TransaksiModel;
use App\Models\KeteranganModel;
use Illuminate\Support\Facades\Auth;

class AksesController extends Controller
{
    function index()
    { 
        $totalSaldo = SaldoModel::getTotalSaldo();
        $totalKeluar = TransaksiModel::getTotalKeluar();
        $totalMasuk = TransaksiModel::getTotalMasuk();
        $totalPenjualan = PenjualanModel::getTotalPenjualan();
        $totalSetoran = BankModel::getTotalSetoran();
      
        // Menghitung saldo setelah dikurangi jumlah keluar
        $saldoAkhir = ($totalSaldo - $totalKeluar) + $totalMasuk + ($totalPenjualan) - ($totalSetoran);
        $pengeluaran = $totalKeluar -  $totalMasuk;

        return view('admin.dashboard', ['saldoAkhir' => $saldoAkhir, 'pengeluaran' => $pengeluaran, 'totalMasuk' => $totalMasuk]);
    }
    
    function admin()
    {
        $totalSaldo = SaldoModel::getTotalSaldo();
        $totalKeluar = TransaksiModel::getTotalKeluar();
        $totalMasuk = TransaksiModel::getTotalMasuk();
        $totalPenjualan = PenjualanModel::getTotalPenjualan();
        $totalSetoran = BankModel::getTotalSetoran();
      
        // Menghitung saldo setelah dikurangi jumlah keluar
        $saldoAkhir = ($totalSaldo - $totalKeluar) + $totalMasuk + ($totalPenjualan) - ($totalSetoran);
        $pengeluaran = $totalKeluar -  $totalMasuk;


        return view('admin.dashboard', ['saldoAkhir' => $saldoAkhir, 'pengeluaran' => $pengeluaran, 'totalMasuk' => $totalMasuk]);
    }
    function kasir()
    {
        $totalSaldo = SaldoModel::getTotalSaldo();
        $totalKeluar = TransaksiModel::getTotalKeluar();
        $totalMasuk = TransaksiModel::getTotalMasuk();
        $totalPenjualan = PenjualanModel::getTotalPenjualan();
        $totalSetoran = BankModel::getTotalSetoran();
      
        // Menghitung saldo setelah dikurangi jumlah keluar
        $saldoAkhir = ($totalSaldo - $totalKeluar) + $totalMasuk + ($totalPenjualan) - ($totalSetoran);
        $pengeluaran = $totalKeluar -  $totalMasuk;


        return view('admin.dashboard', ['saldoAkhir' => $saldoAkhir, 'pengeluaran' => $pengeluaran, 'totalMasuk' => $totalMasuk]);
    }
}