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
        return view('admin.dashboard', ['totalSaldo' => $totalSaldo, 'totalKeluar' => $totalKeluar, 'totalMasuk' => $totalMasuk]);
    }
    
    function admin()
    {
        $totalKeluar = TransaksiModel::getTotalKeluar();
        $totalMasuk = TransaksiModel::getTotalMasuk();
        $totalSaldo = SaldoModel::getTotalSaldo();
        return view('admin.dashboard', ['totalSaldo' => $totalSaldo, 'totalKeluar' => $totalKeluar, 'totalMasuk' => $totalMasuk]);
    }
    function kasir()
    {
        $totalKeluar = TransaksiModel::getTotalKeluar();
        $totalMasuk = TransaksiModel::getTotalMasuk();
        $totalSaldo = SaldoModel::getTotalSaldo();
        return view('admin.dashboard', ['totalSaldo' => $totalSaldo, 'totalKeluar' => $totalKeluar, 'totalMasuk' => $totalMasuk]);
    }
}