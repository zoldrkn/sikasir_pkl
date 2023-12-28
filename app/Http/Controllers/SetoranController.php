<?php

namespace App\Http\Controllers;

use App\Models\BankModel;
use App\Models\SaldoModel;
use Illuminate\Http\Request;
use App\Models\PenjualanModel;
use App\Models\TransaksiModel;
use App\Models\KeteranganModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SetoranController extends Controller
{
    //>>> Penjualan function
    function tampil_penjualan()
    {
        $totalSaldo = SaldoModel::getTotalSaldo();
        $totalKeluar = TransaksiModel::getTotalKeluar();
        $totalMasuk = TransaksiModel::getTotalMasuk();
        $totalPenjualan = PenjualanModel::getTotalPenjualan();
        $totalSetoran = BankModel::getTotalSetoran();
        $totalBeban = KeteranganModel::getBeban();
        // Menghitung saldo setelah dikurangi jumlah keluar
        $saldoAkhir = ($totalSaldo - $totalKeluar) + $totalMasuk + ($totalPenjualan) - ($totalSetoran) + $totalBeban;

        $filterBulan = PenjualanModel::filterBulan();
        return view('admin.penjualan.tampil_penjualan', compact('filterBulan'), ['saldoAkhir' => $saldoAkhir])->with([
            'penjualan' => PenjualanModel::all(),
        ]);
    }
    
    function create_penjualan()
    {
        return view('admin.penjualan.tambah_penjualan');
    }
    
    public function store_penjualan(Request $request)
    {
        $penjualan = PenjualanModel::create($request->all());
        return redirect('/setoran_penjualan');
    }
    
    public function edit_penjualan(Request $request, $id)
    {
        $penjualan = PenjualanModel::findOrFail($id);
        return view('admin.penjualan.edit_penjualan', ['penjualan' => $penjualan]);
    }
    
    public function update_penjualan(Request $request, $id)
    {
        $penjualan = PenjualanModel::findOrFail($id);
        $penjualan->update($request->all());
        return redirect('/setoran_penjualan');
    }
    
    public function destroy_penjualan($id)
    {
        //$deleteSaldo = DB::table('saldo')->where('id', $id)->delete();
        $deletedPenjualan = PenjualanModel::findOrFail($id);
        $deletedPenjualan->delete();
        return redirect('/setoran_penjualan')->with('danger', 'Data Berhasil Dihapus');
    }
    //>>> END of Penjualan function
    

    //>>> Bank function
    function tampil_bank()
    {
        $totalSaldo = SaldoModel::getTotalSaldo();
        $totalKeluar = TransaksiModel::getTotalKeluar();
        $totalMasuk = TransaksiModel::getTotalMasuk();
        $totalPenjualan = PenjualanModel::getTotalPenjualan();
        $totalSetoran = BankModel::getTotalSetoran();
        $totalBeban = KeteranganModel::getBeban();
        // Menghitung saldo setelah dikurangi jumlah keluar
        $saldoAkhir = ($totalSaldo - $totalKeluar) + $totalMasuk + ($totalPenjualan) - ($totalSetoran) + $totalBeban;

        $filterBulan = BankModel::filterBulan();
        return view('admin.bank.tampil_bank', compact('filterBulan'), ['saldoAkhir' => $saldoAkhir])->with([
            'bank' => BankModel::all(),
        ]);
    }
    
    function create_bank()
    {
        return view('admin.bank.tambah_bank');   
    }

    public function store_bank(Request $request)
    {
        $bank = BankModel::create($request->all());
        return redirect('/setoran_bank');
    }
    
    public function edit_bank(Request $request, $id)
    {
        $bank = BankModel::findOrFail($id);
        return view('admin.bank.edit_bank', ['bank' => $bank]);
    }
    
    public function update_bank(Request $request, $id)
    {
        $bank = BankModel::findOrFail($id);
        $bank->update($request->all());
        return redirect('/setoran_bank');
    }
    
    public function destroy_bank($id)
    {
        //$deleteSaldo = DB::table('saldo')->where('id', $id)->delete();
        $deletedBank = BankModel::findOrFail($id);
        $deletedBank->delete();
        
        return redirect('/setoran_bank');
    }
}