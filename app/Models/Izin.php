<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    use HasFactory;

    protected $table = 'izin';

    protected $fillable = [
        'id_user',
        'tanggal',
        'sampai_tanggal',
        'keterangan',
        'created_at',
        'updated_at'
    ];
}
