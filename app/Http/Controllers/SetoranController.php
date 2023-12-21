<?php

namespace App\Http\Controllers;

use App\Models\PenjualanModel;
use App\Models\BankModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SetoranController extends Controller
{
    function tampil_penjualan()
    {
        return view('admin.penjualan.tampil_penjualan')->with([
            'penjualan' => PenjualanModel::all(),
        ]);
    }
    
    function tampil_bank()
    {
        return view('admin.bank.tampil_bank');
    }

    function create_penjualan()
    {
        return view('admin.penjualan.tambah_penjualan');
    }
    function create_bank()
    {
        return view('admin.bank.tambah_bank');
    }

    public function store_penjualan(Request $request)
    {
        $penjualan = PenjualanModel::create($request->all());
        return redirect('/setoran_penjualan');
    }

    public function edit_saldo(Request $request, $id)
    {

        $saldo = PenjualanModel::findOrFail($id);
        return view('admin.saldo.edit_saldo', ['saldo' => $saldo]);
    }

    public function update(Request $request, $id)
    {
        $saldo = PenjualanModel::findOrFail($id);
        $saldo->update($request->all());
        return redirect('/saldo');
    }

    public function destroy($id)
    {
        //$deleteSaldo = DB::table('saldo')->where('id', $id)->delete();
        $deletedSetoran = PenjualanModel::findOrFail($id);
        $deletedSetoran->delete();
        
        return redirect('/saldo');
    }
}