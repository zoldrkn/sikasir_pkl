<?php

namespace App\Http\Controllers;

use App\Models\PenjualanModel;
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

    function create_setoran()
    {
        return view('admin.saldo.tambah_saldo');
    }

    public function store(Request $request)
    {
        $saldo = PenjualanModel::create($request->all());
        return redirect('/saldo');
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