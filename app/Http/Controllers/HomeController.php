<?php

namespace App\Http\Controllers;

use App\Models\KaryawanModel;
use App\Models\TransaksiModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function kasmasuk()
    {
        return view('admin.kas.kasmasuk');
    }

    function kaskeluar()
    {
        return view('admin.kas.kaskeluar');
    }

    function tampil_kaskecil()
    {
        return view('admin.transaksi.tampil_kaskecil')->with([
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
        return redirect('/kaskecil');
    }

    
}