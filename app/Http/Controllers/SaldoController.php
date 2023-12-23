<?php

namespace App\Http\Controllers;

use App\Models\SaldoModel;
use App\Models\TransaksiModel;
use App\Models\PenjualanModel;
use App\Models\BankModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SaldoController extends Controller
{
    function tampil_saldo()
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
        
        $filterBulan = SaldoModel::filterBulan();
        
        return view('admin.saldo.saldo',  compact('filterBulan'), ['saldoAkhir' => $saldoAkhir])->with([
            'saldo' => SaldoModel::all(),
        ]);
    }

    function create_saldo()
    {
        return view('admin.saldo.tambah_saldo');
    }

    public function store(Request $request)
    {

        // Proses penambahan saldo
        $saldoBaru = new SaldoModel([
            'tanggal_saldo' => $request->input('tanggal_saldo'),
            'keterangan_saldo' => $request->input('keterangan_saldo'),
            'jumlah_saldo' => $request->input('jumlah_saldo'),
        ]);

        $saldoBaru->save();


        return redirect('/saldo')->with('success', 'Berhasil Menambahkan Data');
    }

    public function edit_saldo(Request $request, $id)
    {

        $saldo = SaldoModel::findOrFail($id);
        return view('admin.saldo.edit_saldo', ['saldo' => $saldo]);
    }

    public function update(Request $request, $id)
    {
        $saldo = SaldoModel::findOrFail($id);
        $saldo->update($request->all());
        return redirect('/saldo')->with('warning', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        //$deleteSaldo = DB::table('saldo')->where('id', $id)->delete();
        $deletedSaldo = SaldoModel::findOrFail($id);
        $deletedSaldo->delete();

        return redirect('/saldo')->with('danger', 'Data Berhasil Dihapus');
    }
}