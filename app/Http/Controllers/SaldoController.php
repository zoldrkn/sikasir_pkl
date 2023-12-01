<?php

namespace App\Http\Controllers;

use App\Models\SaldoModel;
use App\Models\TransaksiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SaldoController extends Controller
{
    function tampil_saldo()
    {
        $totalSaldo = SaldoModel::getTotalSaldo();
        $totalKeluar = TransaksiModel::getTotalKeluar();
        $totalMasuk = TransaksiModel::getTotalMasuk();
        // Menghitung saldo setelah dikurangi jumlah keluar
        $saldoAkhir = ($totalSaldo - $totalKeluar) + $totalMasuk;
        return view('admin.saldo.saldo', ['saldoAkhir' => $saldoAkhir])->with([
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


        return redirect('/saldo');
    }

    // private function updateSaldo($id, $saldo)
    // {
    //     // Ambil saldo sebelumnya
    //     $saldoSebelumnya = SaldoModel::where('id', '<', $id)->orderBy('id', 'desc')->first();

    //     // Hitung saldo awal baru
    //     $saldoAwalBaru = $saldoSebelumnya ? $saldoSebelumnya->saldo_awal + $saldo : $saldo;

    //     // Update saldo awal
    //     SaldoModel::where('id', $id)->update(['saldo_awal' => $saldoAwalBaru]);
    // }

    public function edit_saldo(Request $request, $id)
    {

        $saldo = SaldoModel::findOrFail($id);
        return view('admin.saldo.edit_saldo', ['saldo' => $saldo]);
    }

    public function update(Request $request, $id)
    {
        $saldo = SaldoModel::findOrFail($id);
        $saldo->update($request->all());
        return redirect('/saldo');
    }

    public function destroy($id)
    {
        //$deleteSaldo = DB::table('saldo')->where('id', $id)->delete();
        $deletedSaldo = SaldoModel::findOrFail($id);
        $deletedSaldo->delete();

        return redirect('/saldo');
    }
}