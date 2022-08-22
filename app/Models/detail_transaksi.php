<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_transaksi extends Model
{
    use HasFactory;
    protected $table = 't_sales_det';
    protected $primaryKey = 'sales_id';
    protected $fillable = [
        'sales_id', //baru
        'barang_id', //baru'
        'transaksi_id',
        'harga_bandrol',
        'qty',
        'diskon_pct',
        'diskon_nilai',
        'harga_diskon',
        'total'
    ];
}
