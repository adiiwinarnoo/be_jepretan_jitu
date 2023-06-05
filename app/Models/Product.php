<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'id',
        'id_user',
        'foto',
        'foto_two',
        'foto_three',
        'judul_product',
        'harga_product',
        'nomor_whatsapp',
        'domisili',
        'deskripsi',
    ];
}
