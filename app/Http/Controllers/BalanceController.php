<?php

namespace App\Http\Controllers;

use App\Models\SaldoModel;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function addBalance(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'amount' => 'required|numeric',
        ]);

        // Proses penambahan saldo
        $amount = $request->input('amount');
        $currentBalance = SaldoModel::find(1); // Gantilah dengan logika untuk mendapatkan saldo saat ini

        // Update saldo
        $currentBalance->amount += $amount;
        $currentBalance->save();

        // Redirect atau berikan respons sesuai kebutuhan
        return redirect()->route('balance.index')->with('success', 'Saldo berhasil ditambahkan.');
    }
}