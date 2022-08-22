<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $table = 'm_customer';
    protected $fillable = [
        'id', //baru
        'kode_customer', //baru'
        'nama_customer',
        'telp',
        'alamat'
    ];
}
