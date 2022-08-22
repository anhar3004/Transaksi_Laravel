<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class transaksiController extends Controller
{
    public function index()
    {
        return view('transaksi');
    }

    public function tabel_transaksi()
    {
        $transaksi = DB::table('t_sales')
            ->join('m_customer', 't_sales.cust_id', '=', 'm_customer.id')
            ->select('t_sales.*', 'm_customer.nama_customer')
            ->orderBy(
                'kode_transaksi',
                'asc'
            )->get();

        // $transaksi = \App\Models\transaksi::orderby('kode_transaksi', 'asc')->get();
        return response()->json($transaksi);
    }

    public function tabel_detail($id)
    {
        $transaksi = DB::table('t_sales_det')
            ->join('t_sales', 't_sales_det.transaksi_id', '=', 't_sales.id')
            ->join('m_barang', 't_sales_det.barang_id', '=', 'm_barang.id')
            ->select('t_sales_det.*', 't_sales.kode_transaksi', 'm_barang.*')
            ->where('t_sales.kode_transaksi', $id)->orderBy(
                'sales_id',
                'asc'
            )->get();
        return response()->json($transaksi);
    }

    public function no_transaksi()
    {

        $awal = date('Y') . date('m');
        $no_transaksi = \App\Models\transaksi::max('id');
        $no = 1;
        // $no_transaksi = sprintf("%03s", ($id + 1)). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');

        if ($no_transaksi) {

            $id = $awal . '-' . sprintf("%04s", abs($no_transaksi + 1));
            $no_transaksi = $id;
        } else {
            $id =  $awal . '-' . sprintf("%04s", $no);
            $no_transaksi = $id;
        }

        return $no_transaksi;
    }

    public function kode_customer()
    {
        $customer = \App\Models\customer::orderby('kode_customer', 'asc')->get();
        return response()->json($customer);
    }

    public function data_customer($id)
    {
        $customer = \App\Models\customer::where('id', $id)->get();
        return response()->json($customer);
    }

    public function kode_barang()
    {
        $barang = \App\Models\barang::orderby('kode_barang', 'asc')->get();
        return response()->json($barang);
    }

    public function data_barang($id)
    {
        $barang = \App\Models\barang::where('id', $id)->get();
        return response()->json($barang);
    }

    public function create_barang(Request $request)
    {

        $transaksi = \App\Models\transaksi::create([

            'kode_transaksi' => $request->kode_transaksi,
            'tgl' => $request->tgl,
            'cust_id' => $request->cust_id,
        ]);

        $diskon_nilai = ($request->harga_bandrol * $request->diskon_pct) / 100;
        $harga_diskon = $request->harga_bandrol - $diskon_nilai;
        $total = $request->qty * $harga_diskon;

        \App\Models\detail_transaksi::create([

            'barang_id' => $request->barang_id,
            'transaksi_id' => $transaksi->id,
            'harga_bandrol' => $request->harga_bandrol,
            'qty' => $request->qty,
            'diskon_pct' => $request->diskon_pct,
            'diskon_nilai' => $diskon_nilai,
            'harga_diskon' => $harga_diskon,
            'total' => $total,
        ]);

        // $transaksi = \App\Models\transaksi::where('id', $transaksi->id)->get();
        // $transaksi->update([

        //     'subtotal' => null,
        //     'total_bayar' => null,
        // ]);

        // dd($diskon_nilai);
    }

    public function create_transaksi(Request $request, $id)
    {

        $qty =  DB::table('t_sales_det')
            ->join('t_sales', 't_sales_det.transaksi_id', '=', 't_sales.id')
            ->select('t_sales_det.*', 't_sales.*')
            ->where('t_sales.kode_transaksi', $id)->sum('t_sales_det.qty');

        $transaksi = \App\Models\transaksi::where('kode_transaksi', $id);
        $transaksi->update([
            'tgl' => $request->tgl,
            'cust_id' => $request->cust_id,
            'qty' => $qty,
            'subtotal' => $request->subtotal,
            'diskon' => $request->diskon,
            'ongkir' => $request->ongkir,
            'total_bayar' => $request->total_bayar,
        ]);
        // return response()->json($qty);
    }

    public function tambah_barang(Request $request)
    {

        $transaksi =  \App\Models\transaksi::where('kode_transaksi', $request->kode_transaksi)->value('id');

        $diskon_nilai = ($request->harga_bandrol * $request->diskon_pct) / 100;
        $harga_diskon = $request->harga_bandrol - $diskon_nilai;
        $total = $request->qty * $harga_diskon;

        \App\Models\detail_transaksi::create([

            'barang_id' => $request->barang_id,
            'transaksi_id' => $transaksi,
            'harga_bandrol' => $request->harga_bandrol,
            'qty' => $request->qty,
            'diskon_pct' => $request->diskon_pct,
            'diskon_nilai' => $diskon_nilai,
            'harga_diskon' => $harga_diskon,
            'total' => $total,
        ]);
    }

    public function total(Request $request)
    {

        $total =  DB::table('t_sales_det')
            ->join('t_sales', 't_sales_det.transaksi_id', '=', 't_sales.id')
            ->select('t_sales_det.*', 't_sales.*')
            ->where('kode_transaksi', $request->kode_transaksi)->sum('total');

        return $total;
    }

    public function grand_total()
    {

        $total =  \App\Models\transaksi::sum('total_bayar');

        return $total;
    }

    public function edit_barang($id)
    {
        $transaksi = DB::table('t_sales_det')
            ->join('t_sales', 't_sales_det.transaksi_id', '=', 't_sales.id')
            ->join('m_barang', 't_sales_det.barang_id', '=', 'm_barang.id')
            ->select('t_sales_det.*', 't_sales.kode_transaksi', 'm_barang.*')
            ->where('sales_id', $id)->get();
        return response()->json($transaksi);
    }

    public function edit_transaksi($id)
    {
        $transaksi = DB::table('t_sales')
            ->join('m_customer', 't_sales.cust_id', '=', 'm_customer.id')
            ->select('t_sales.*', 'm_customer.*')
            ->where('t_sales.id', $id)->get();
        return response()->json($transaksi);
    }

    public function update_barang(Request $request, $id)
    {

        $diskon_nilai = ($request->harga_bandrol * $request->diskon_pct) / 100;
        $harga_diskon = $request->harga_bandrol - $diskon_nilai;
        $total = $request->qty * $harga_diskon;

        $transaksi =  \App\Models\detail_transaksi::find($id);
        $transaksi->update([

            'barang_id' => $request->barang_id,
            'harga_bandrol' => $request->harga_bandrol,
            'qty' => $request->qty,
            'diskon_pct' => $request->diskon_pct,
            'diskon_nilai' => $diskon_nilai,
            'harga_diskon' => $harga_diskon,
            'total' => $total,
        ]);
    }

    public function delete_transaksi($id)
    {
        $barang = \App\Models\detail_transaksi::where('transaksi_id',$id);
        $barang->delete();

        $transaksi = \App\Models\transaksi::where('id',$id);
        $transaksi->delete();
    }

    public function delete_barang($id)
    {
        $transaksi = \App\Models\detail_transaksi::find($id);
        $transaksi->delete();
    }

    public function batal_transaksi($id)
    {
        $barang = DB::table('t_sales_det')
            ->join('t_sales', 't_sales_det.transaksi_id', '=', 't_sales.id')
            ->select('t_sales_det.*', 't_sales.*')
            ->where('t_sales.kode_transaksi', $id);
        $barang->delete();

        $transaksi = \App\Models\transaksi::where('kode_transaksi',$id);
        $transaksi->delete();
    }

    public function cetak_laporan()
    {
        $transaksi = DB::table('t_sales')
            ->join('m_customer', 't_sales.cust_id', '=', 'm_customer.id')
            ->select('t_sales.*', 'm_customer.nama_customer')
            ->orderBy(
                'kode_transaksi',
                'asc'
            )->get();

            $total =  \App\Models\transaksi::sum('total_bayar');

        $pdf = PDF::loadView('laporan.laporan_transaksi',['transaksi' =>$transaksi,'total' =>$total])->setPaper('a4', 'landscape');

        return $pdf->download('laporan_transaksi.pdf');

        // return view('laporan.laporan_transaksi',['transaksi' =>$transaksi,'total' =>$total]);
    }

    public function cetak_pertanggal(Request $request)
    {


        $transaksi = DB::table('t_sales')
            ->join('m_customer', 't_sales.cust_id', '=', 'm_customer.id')
            ->select('t_sales.*', 'm_customer.nama_customer')
            ->orderBy(
                'kode_transaksi',
                'asc'
            )->where('tgl','>=',$request->tanggal_awal)->where('tgl','<=',$request->tanggal_akhir)->get();


         $total =  \App\Models\transaksi::where('tgl','>=',$request->tanggal_awal)->where('tgl','<=',$request->tanggal_akhir)->sum('total_bayar');

        $pdf = PDF::loadView('laporan.laporan_transaksi',['transaksi' =>$transaksi,'total' =>$total])->setPaper('a4', 'landscape');

        return $pdf->download('laporan_transaksi'.'_'.'('.$request->tanggal_awal.'-'.$request->tanggal_akhir.')'.'.pdf');

        // return view('laporan.laporan_transaksi',['transaksi' =>$transaksi,'total' =>$total]);
    }

    public function cetak_detail(Request $request,$id)
    {

        $transaksi = DB::table('t_sales')
        ->join('m_customer', 't_sales.cust_id', '=', 'm_customer.id')
        ->select('t_sales.*', 'm_customer.*')
        ->where('t_sales.id',$id)->get();

        $barang = DB::table('t_sales_det')
        ->join('m_barang', 't_sales_det.barang_id', '=', 'm_barang.id')
        ->select('t_sales_det.*', 'm_barang.*')
        ->where('transaksi_id', $id)->orderBy(
            'sales_id',
            'asc'
        )->get();

        $kode_transaksi = \App\Models\transaksi::find($id);

        $pdf = PDF::loadView('laporan.laporan_detail_transaksi',['transaksi' =>$transaksi,'barang' =>$barang])->setPaper('a4', 'landscape');

        return $pdf->download('detail_transaksi'.'_'.$kode_transaksi->kode_transaksi.'.pdf');
        // return view('laporan.laporan_detail_transaksi',['transaksi' =>$transaksi,'barang' =>$barang]);
        // return response()->json($transaksi);
    }
}
