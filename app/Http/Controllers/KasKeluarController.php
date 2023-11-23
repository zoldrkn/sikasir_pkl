<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KasKeluarController extends Controller
{
    function tampil_kaskeluar()
    {
        return view('admin.kas.kaskeluar');
    }

    function create_kaskeluar()
    {
        return view('admin.kas.tambahKasKeluar');
    }
}