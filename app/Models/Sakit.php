<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sakit extends Model
{
    use HasFactory;

    protected $table = 'sakit';

    protected $fillable = [
        'id_user',
        'tanggal',
        'sampai_tanggal',
        'foto_surat_sakit',
        'created_at',
        'updated_at'
    ];
}
