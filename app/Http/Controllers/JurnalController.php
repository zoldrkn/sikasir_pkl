<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JurnalController extends Controller
{
    function tampil_jurnal()
    {
        return view('admin.jurnal.jurnalumum');
    }
    function create_kaskeluar()
    {
        return view('admin.kas.tambahKasKeluar');
    }
}