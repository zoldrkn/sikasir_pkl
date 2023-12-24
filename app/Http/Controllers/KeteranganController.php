<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KaryawanModel;
use App\Models\TransaksiModel;
use App\Models\KeteranganModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KeteranganController extends Controller
{
    public function edit_kaskecil(Request $request, $id, $transaksi_kaskecil_id)
{

$kaskecil = TransaksiModel::findOrFail($id);

$keterangan = KeteranganModel::with('transaksi_relasi')->find($transaksi_kaskecil_id);

return view('admin.transaksi.edit_kaskecil', compact('keterangan', 'kaskecil'));
}

public function update(Request $request, $id)
{
$kaskecil = TransaksiModel::findOrFail($id);
$kaskecil->update($request->all());

$keterangan = KeteranganModel::findOrFail($id);
$keterangan->update($request->all());

return redirect('/kaskecil')->with('warning', 'Data Berhasil Diubah');
}
}