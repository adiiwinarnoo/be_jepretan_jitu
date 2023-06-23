<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'id',
        'id_user',
        'id_product',
        'tanggal',
        'alamat',
        'bukti_pembayaran',
        'status',
    ];
}
