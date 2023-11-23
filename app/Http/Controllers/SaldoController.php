<?php

namespace App\Http\Controllers;

use App\Models\SaldoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SaldoController extends Controller
{
    function tampil_saldo()
    {
        return view('admin.saldo.saldo')->with([
            'saldo' => SaldoModel::all(),
        ]);
    }

    function create_saldo()
    {
        return view('admin.saldo.tambah_saldo');
    }

    public function store(Request $request)
    {
        $saldo = SaldoModel::create($request->all());
        return redirect('/saldo');
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