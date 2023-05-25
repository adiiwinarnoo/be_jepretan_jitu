<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dinas extends Model
{
    use HasFactory;

    protected $table = 'dinas';

    protected $fillable = [
        'id_user',
        'tanggal',
        'sampai_tanggal',
        'foto_surat_dinas',
        'created_at',
        'updated_at'
    ];
}
