<?php

namespace App\Http\Controllers;

use App\Models\KaryawanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KaryawanController extends Controller
{
    function tampil_karyawan()
    {
        return view('admin.karyawan.tampil_karyawan')->with([
            'karyawan' => KaryawanModel::all(),
        ]);
    }

    function create_karyawan()
    {
        return view('admin.karyawan.tambah_karyawan');
    }

    public function store(Request $request)
    {
        $karyawan = KaryawanModel::create($request->all());
        return redirect('/karyawan')->with('seccess', 'Berhasil Menambahkan Data');
    }

    public function edit_karyawan(Request $request, $id)
    {

        $karyawan = KaryawanModel::findOrFail($id);
        return view('admin.karyawan.edit_karyawan', ['karyawan' => $karyawan]);
    }

    public function update(Request $request, $id)
    {
        $karyawan = KaryawanModel::findOrFail($id);
        $karyawan->update($request->all());
        return redirect('/karyawan')->with('warning', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        //$deleteSaldo = DB::table('saldo')->where('id', $id)->delete();
        $deletedKaryawan = KaryawanModel::findOrFail($id);
        $deletedKaryawan->delete();
        
        return redirect('/karyawan')->with('danger', 'Data Berhasil Dihapus');;
    }
}