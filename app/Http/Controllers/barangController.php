<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class barangController extends Controller
{
    public function index ()
    {
        return view('barang');
    }

    public function tabel_barang()
    {

        $barang = \App\Models\barang::orderby('kode_barang', 'asc')->get();
        return response()->json($barang);

    }

    public function kode_barang()
    {

        $awal = ['A', 'B', 'C', 'D', 'E'];
        $kode_barang = \App\Models\barang::max('id');
        $no = 1;
        // $kode_barang = sprintf("%03s", ($id + 1)). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');

        if ($kode_barang) {
            $random = Arr::random($awal);
            $id = $random . sprintf("%03s", abs($kode_barang + 1));
            $kode_barang = $id;
        } else {
            $random = Arr::random($awal);
            $id =  $random . sprintf("%03s", $no);
            $kode_barang = $id;
        }

        return $kode_barang;
    }

    public function create(Request $request)
    {

        \App\Models\barang::create([

            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,

        ]);
    }

    public function edit($id)
    {
        $barang = \App\Models\barang::where('id', $id)->get();
        return response()->json($barang);
    }

    public function update(Request $request, $id)
    {
        $barang = \App\Models\barang::where('id', $id);
        $barang->update([

            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,

        ]);
    }

    public function delete($id)
    {
        $barang = \App\Models\barang::find($id);
        $barang->delete();
    }


    public function cetak_laporan()
    {
        $barang = \App\Models\barang::orderby('kode_barang', 'asc')->get();

        $pdf = PDF::loadView('laporan.laporan_barang',['barang' =>$barang])->setPaper('a4', 'landscape');

        return $pdf->download('laporan_barang.pdf');

        // return view('laporan.laporan_barang',['barang' =>$barang]);
    }
}
