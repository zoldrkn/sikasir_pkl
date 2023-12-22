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
        return view('admin.penjualan.tampil_penjualan');
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
        
        return redirect('/setoran_penjualan');
    }
    
    function tampil_bank()
    {
        return view('admin.bank.tampil_bank');
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