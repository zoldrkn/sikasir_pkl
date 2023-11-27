<?php

namespace App\Http\Controllers;
use App\Models\SaldoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AksesController extends Controller
{
    function index()
    {
        $saldo_baru = SaldoModel::latest()->first();
        return view('admin.dashboard', ['saldo_baru' => $saldo_baru]);
    }
    
    function admin()
    {
        $saldo_baru = SaldoModel::latest()->first();
        return view('admin.dashboard', ['saldo_baru' => $saldo_baru]);
    }
    function kasir()
    {
        $saldo_baru = SaldoModel::latest()->first();
        return view('admin.dashboard', ['saldo_baru' => $saldo_baru]);
    }
}