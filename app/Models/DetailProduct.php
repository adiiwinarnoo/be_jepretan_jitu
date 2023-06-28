<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProduct extends Model
{
    use HasFactory;

    protected $table = 'detail_foto_product';

    protected $fillable = [
        'id',
        'id_product',
        'id_user',
        'review',
        'rating'
    ];
}
