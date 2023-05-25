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
use PDF;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index() {

        $dashboard = [];

        $users = User::all();
        
        if (sizeof($users) > 0) {
            foreach($users as $user) {
                $userId = $user->id;
                // dd($userId);

                $date =  Carbon::today();
                $date_ =  Carbon::now()->format("D");
                $year = Carbon::now()->format("Y");
                // dd($month_);
                // dd($date);

                $absensi = Level::select('nama_level')
                        ->join('users', 'users.id_level', 'level_users.id')
                        ->where('users.id', $userId)
                        ->get();
                
                $hadir = Absensi::select('id')
                        ->join('users', 'users.id', 'absensi.id_user')
                        ->where('users.id', $userId)
                        ->whereDate('absensi.tanggal', '=', $date)
                        ->whereYear('absensi.tanggal', '=', $year)
                        ->count();

                $izin = Izin::select('id')
                        ->join('users', 'users.id', 'izin.id_user')
                        ->where('users.id', $userId)
                        ->whereMonth('izin.tanggal', '=', $date)
                        ->whereYear('izin.tanggal', '=', $year)
                        ->count();

                $sakit = Sakit::select('id')
                        ->join('users', 'users.id', 'sakit.id_user')
                        ->where('users.id', $userId)
                        ->whereMonth('sakit.tanggal', '=', $date)
                        ->whereYear('sakit.tanggal', '=', $year)
                        ->count();
                $dinas = Dinas::select('id')
                        ->join('users', 'users.id', 'dinas.id_user')
                        ->where('users.id', $userId)
                        ->whereDate('dinas.tanggal', '=', $date)
                        ->whereYear('dinas.tanggal', '=', $year)
                        ->count();
                    
    
                
                $arr = array(
                    'id'        => $user->id,
                    'nama'      => $user->nama,
                    'nik'       => $user->nik,
                    'level'     => $absensi[0]->nama_level,
                    'hadir'     => $hadir,
                    'izin'      => $izin,
                    'sakit'     => $sakit,
                    'dinas'     => $dinas
                  
                );
                array_push($dashboard, $arr);

            }
            // dd($dashboard);
            return view('report.index', compact('dashboard', 'date_', 'year'));
        }
    }
    public function cetak() {

        $dashboard = [];

        $users = User::all();
        
        if (sizeof($users) > 0) {
            foreach($users as $user) {
                $userId = $user->id;
                // dd($userId);

                $date =  Carbon::today();
                $date_ =  Carbon::now()->format("D");
                $year = Carbon::now()->format("Y");
                // dd($month_);
                // dd($date);

                $absensi = Level::select('nama_level')
                        ->join('users', 'users.id_level', 'level_users.id')
                        ->where('users.id', $userId)
                        ->get();
                
                $hadir = Absensi::select('id')
                        ->join('users', 'users.id', 'absensi.id_user')
                        ->where('users.id', $userId)
                        ->whereDate('absensi.tanggal', '=', $date)
                        ->whereYear('absensi.tanggal', '=', $year)
                        ->count();

                $izin = Izin::select('id')
                        ->join('users', 'users.id', 'izin.id_user')
                        ->where('users.id', $userId)
                        ->whereMonth('izin.tanggal', '=', $date)
                        ->whereYear('izin.tanggal', '=', $year)
                        ->count();

                $sakit = Sakit::select('id')
                        ->join('users', 'users.id', 'sakit.id_user')
                        ->where('users.id', $userId)
                        ->whereMonth('sakit.tanggal', '=', $date)
                        ->whereYear('sakit.tanggal', '=', $year)
                        ->count();
                $dinas = Dinas::select('id')
                        ->join('users', 'users.id', 'dinas.id_user')
                        ->where('users.id', $userId)
                        ->whereDate('dinas.tanggal', '=', $date)
                        ->whereYear('dinas.tanggal', '=', $year)
                        ->count();
                    
    
                
                $arr = array(
                    'id'        => $user->id,
                    'nama'      => $user->nama,
                    'nik'       => $user->nik,
                    'level'     => $absensi[0]->nama_level,
                    'hadir'     => $hadir,
                    'izin'      => $izin,
                    'sakit'     => $sakit,
                    'dinas'     => $dinas
                  
                );
                array_push($dashboard, $arr);

            }
            $pdf = PDF::loadview('report.pdf',compact('dashboard', 'date_', 'year'));
            // // dd($dashboard);
            $pdf->set_paper('letter', 'landscape');
            return $pdf->stream();

            // return view('report.pdf', compact('dashboard', 'date_', 'year'));
        }
    }
}