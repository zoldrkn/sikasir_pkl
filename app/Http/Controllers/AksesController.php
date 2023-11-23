<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AksesController extends Controller
{
    function index()
    {
        return view('admin.dashboard');
    }
    
    function admin()
    {
        return view('admin.dashboard');
    }
    function kasir()
    {
        return view('admin.dashboard');
    }
}