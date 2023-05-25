<?php

namespace App\Http\Controllers\Hrd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Izin;
use App\Models\Sakit;
use App\Models\Dinas;

class AbsensiController extends Controller
{
    public function hadir() {
        $hadir =  Absensi::select('users.nama', 'users.nik', 'absensi.tanggal', 'absensi.waktu_masuk', 'absensi.waktu_keluar')
                    ->join('users', 'users.id', 'absensi.id_user')
                    ->get();
        // dd($absensi);
        return view('absensi.hadir', compact('hadir'));
    }

    public function izin() {
        $izin = Izin::select('tanggal', 'sampai_tanggal', 'keterangan', 'izin.status', 'users.nama', 'users.nik')
                    ->join('users', 'users.id', 'izin.id_user')
                    ->get();

        return view('absensi.izin', compact('izin'));
    }

    public function sakit() {
        $sakit = Sakit::select('tanggal', 'sampai_tanggal', 'foto_surat_sakit', 'users.nama', 'users.nik')
                    ->join('users', 'users.id', 'sakit.id_user')
                    ->get();
        // dd($sakit);

        return view('absensi.sakit', compact('sakit'));
    }
    public function dinas() {
        $dinas = Dinas::select('tanggal', 'sampai_tanggal', 'foto_surat_dinas', 'users.nama', 'users.nik')
                    ->join('users', 'users.id', 'dinas.id_user')
                    ->get();
        // dd($sakit);

        return view('absensi.dinas', compact('dinas'));
    }
}
