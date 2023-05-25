<?php

namespace App\Http\Controllers\Hrd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Level;
use App\Models\Absensi;
use App\Models\Izin;
use App\Models\Sakit;
use App\Models\Dinas;
use DB;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index() {

        $date = Carbon::now()->format('d M Y');

        $hadir =  Absensi::select('users.nama', 'users.nik', 'tanggal')
                    ->join('users', 'users.id', 'absensi.id_user')
                    ->whereDate('absensi.tanggal', Carbon::today())
                    ->get();
        
        $izin = Izin::select('users.nama', 'users.nik', 'tanggal')
                    ->join('users', 'users.id', 'izin.id_user')
                    ->whereDate('izin.tanggal', Carbon::today())
                    ->get();
 
        $sakit = Sakit::select('users.nama', 'users.nik', 'tanggal')
                    ->join('users', 'users.id', 'sakit.id_user')
                    ->whereDate('sakit.tanggal', Carbon::today())
                    ->get();
        
        $dinas = Dinas::select('users.nama', 'users.nik', 'tanggal')
                    ->join('users', 'users.id', 'dinas.id_user')
                    ->whereDate('dinas.tanggal', Carbon::today())
                    ->get();
    
        return view('dashboard.index', compact('date', 'hadir', 'izin', 'sakit','dinas'));

    }
}
