<?php

namespace App\Http\Controllers;

use App\Models\KaryawanModel;
use App\Models\TransaksiModel;
use App\Models\PenjualanModel;
use App\Models\BankModel;
use App\Models\SaldoModel;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{

    function tampil_kaskecil()
    {
       
        // $totalSaldo = SaldoModel::getTotalSaldo();
        // $totalKeluar = TransaksiModel::getTotalKeluar();
        // $totalMasuk = TransaksiModel::getTotalMasuk();
        // // Menghitung saldo setelah dikurangi jumlah keluar
        // $saldoAkhir = ($totalSaldo - $totalKeluar) + $totalMasuk;
        $totalSaldo = SaldoModel::getTotalSaldo();
        $totalKeluar = TransaksiModel::getTotalKeluar();
        $totalMasuk = TransaksiModel::getTotalMasuk();
        $totalPenjualan = PenjualanModel::getTotalPenjualan();
        $totalSetoran = BankModel::getTotalSetoran();
        // Menghitung saldo setelah dikurangi jumlah keluar
        $saldoAkhir = ($totalSaldo - $totalKeluar) + ($totalMasuk) + ($totalPenjualan) - ($totalSetoran);

        $filterBulan = TransaksiModel::filterBulan();
        return view('admin.transaksi.tampil_kaskecil', compact('filterBulan'), ['saldoAkhir' => $saldoAkhir])->with([
            'kaskecil' => TransaksiModel::all(),
        ]);
    }

    function create_kaskecil()
    {
        
        return view('admin.transaksi.tambah_kaskecil');
    }

    public function store(Request $request)
    {
        $kaskecil = TransaksiModel::create($request->all());
        $karyawan = KaryawanModel::create($request->all());
       
        // return redirect('/kaskecil');
        return redirect('/kaskecil')->with('success', 'Berhasil Menambahkan Data');
    }

    public function edit_kaskecil(Request $request, $id)
    {

        $kaskecil = TransaksiModel::findOrFail($id);
        return view('admin.transaksi.edit_kaskecil', ['kaskecil' => $kaskecil]);
    }

    public function update(Request $request, $id)
    {
        $kaskecil = TransaksiModel::findOrFail($id);

        $kaskecil->update($request->all());

        return redirect('/kaskecil')->with('warning', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        //$deleteSaldo = DB::table('saldo')->where('id', $id)->delete();
        $deletedKaskecil = TransaksiModel::findOrFail($id);
        $deletedKaskecil->delete();

        return redirect('/kaskecil')->with('danger', 'Data Berhasil Dihapus');
    }
}