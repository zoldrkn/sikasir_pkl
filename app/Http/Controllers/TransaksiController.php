<?php

namespace App\Http\Controllers;

use App\Models\KaryawanModel;
use App\Models\TransaksiModel;
use App\Models\PenjualanModel;
use App\Models\BankModel;
use App\Models\KeteranganModel;
use App\Models\SaldoModel;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{

    function tampil_kaskecil()
    {
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
        $karyawan = KaryawanModel::all();
        return view('admin.transaksi.tambah_kaskecil', compact('karyawan'));
    }

    public function store(Request $request)
    {
        
        $kaskecil = TransaksiModel::create($request->all());

        $keterangan = KeteranganModel::create([
            'transaksi_kaskecil_id' => $kaskecil->id,
            'ket1' => $request->input('ket1'),
            'ket2' => $request->input('ket2'),
            'ket3' => $request->input('ket3'),
            'nominal1' => $request->input('nominal1'),
            'nominal2' => $request->input('nominal2'),
            'nominal3' => $request->input('nominal3'),
            'nominal4' => $request->input('nominal4'),
            'lainnya' => $request->input('lainnya'),
            'nominal_lainnya'=> $request->input('nominal_lainnya'),
        ]);
               
        // return redirect('/kaskecil');
        return redirect('/kaskecil')->with('success', 'Berhasil Menambahkan Data');
    }

    public function detail_kaskecil(Request $request, $id, $karyawan_id, $transaksi_kaskecil_id)
    {

        $kaskecil = TransaksiModel::findOrFail($id);
        
        $karyawan = TransaksiModel::with('karyawan_relasi')->find($karyawan_id);
      
        $keterangan = KeteranganModel::with('keterangan_relasi')->find($transaksi_kaskecil_id);
        
        return view('admin.transaksi.detail_kaskecil', compact('karyawan', 'kaskecil','keterangan'));
    }

    public function edit_kaskecil(Request $request, $id, $transaksi_kaskecil_id)
    {

        $kaskecil = TransaksiModel::findOrFail($id);
           
        $keterangan = KeteranganModel::with('keterangan_relasi')->find($transaksi_kaskecil_id);
        // $keterangan = KeteranganModel::findOrFail($transaksi_kaskecil_id);
        
        return view('admin.transaksi.edit_kaskecil', compact('keterangan', 'kaskecil'));
    }

    public function update(Request $request, $id, $transaksi_kaskecil_id)
    {
        $kaskecil = TransaksiModel::findOrFail($id);
        $kaskecil->update($request->all());

        $keterangan = KeteranganModel::findOrFail($transaksi_kaskecil_id);
        $keterangan->update($request->all());
        

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