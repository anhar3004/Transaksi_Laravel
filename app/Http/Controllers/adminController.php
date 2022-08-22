<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index ()
    {
        $customer = \App\Models\customer::all()->count();
        $barang = \App\Models\barang::all()->count();
        $transaksi = \App\Models\transaksi::all()->count();
        $total =  \App\Models\transaksi::sum('total_bayar');
        return view('home',['customer'=>$customer,'barang'=>$barang,'transaksi'=>$transaksi,'total'=>$total]);
    }
}
