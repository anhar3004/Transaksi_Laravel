<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use PDF;

class customerController extends Controller
{
    public function index ()
    {
        return view('customer');
    }

    public function tabel_customer()
    {

        $customer = \App\Models\customer::orderby('nama_customer', 'asc')->get();
        return response()->json($customer);
    }

    public function kode_customer()
    {

        $awal = 'CST';
        $kode_customer = \App\Models\customer::max('id');
        $no = 1;
        // $kode_customer = sprintf("%03s", ($id + 1)). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');

        if ($kode_customer) {

            $id = $awal . sprintf("%03s", abs($kode_customer + 1));
            $kode_customer = $id;
        } else {
            $id =  $awal . sprintf("%03s", $no);
            $kode_customer = $id;
        }

        return $kode_customer;
    }

    public function create(Request $request)
    {

        \App\Models\customer::create([

            'kode_customer' => $request->kode_customer,
            'nama_customer' => $request->nama_customer,
            'telp' => $request->telp,
            'alamat' => $request->alamat,

        ]);
    }

    public function edit($id)
    {
        $customer = \App\Models\customer::where('id', $id)->get();
        return response()->json($customer);
    }

    public function update(Request $request, $id)
    {
        $customer = \App\Models\customer::where('id', $id);
        $customer->update([

            'kode_customer' => $request->kode_customer,
            'nama_customer' => $request->nama_customer,
            'telp' => $request->telp,
            'alamat' => $request->alamat,

        ]);
    }

    public function delete($id)
    {
        $customer = \App\Models\customer::find($id);
        $customer->delete();
    }

    public function cetak_laporan()
    {
        $customer = \App\Models\customer::orderby('kode_customer', 'asc')->get();

        $pdf = PDF::loadView('laporan.laporan_customer',['customer' =>$customer])->setPaper('a4', 'landscape');

        return $pdf->download('laporan_customer.pdf');

        // return view('laporan.laporan_barang',['barang' =>$barang]);
    }
}
