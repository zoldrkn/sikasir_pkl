<?php

namespace App\Http\Controllers;

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

    
}