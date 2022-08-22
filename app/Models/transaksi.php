<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $table = 't_sales';
    protected $fillable = [
        'id', //baru
        'kode_transaksi', //baru'
        'tgl',
        'cust_id',
        'qty',
        'subtotal',
        'diskon',
        'ongkir',
        'total_bayar',
    ];
}
