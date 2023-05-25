<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Izin;
use App\Models\Absensi;
use App\Models\Sakit;
use App\Models\Dinas;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function checkin(Request $request) {

        $date = Carbon::now()->format('Y-m-d');
        $time = Carbon::now()->format('H:i:s');

        $surat = $request->foto_absensi; 
        $surat = str_replace('data:image/png;base64,', '', $surat);
        $surat = str_replace(' ', '+', $surat);      
        $suratx = md5(uniqid(rand(), true));
        $suratName = $suratx.'.'.'jpg';

        Storage::disk('surat')->put($suratName, base64_decode($surat)); 


        $absensi =  Absensi::create([
                        'id_user'       => $request->input('id_user'),
                        'tanggal'       => $date,
                        'waktu_masuk'   => $request->input('waktu_masuk'),
                        'foto_absensi'  => "/images/absensi/sakit/".$suratName
                    ]);

        if($absensi) {
            return response()->json([
                'status' => 1,
                'message' => 'Data Checkin Berhasil Disimpan',
                'dataCheckin' => $absensi
            ], 200);
        }else {
            return response()->json([
                'status' => 0,
                'message' => 'Data Checkin Gagal Disimpan'                                     
            ], 200);
        }
    }

    public function checkout(Request $request) {

        $time = Carbon::now()->format('H:i:s');

        $absensiId = DB::select("
                    select id
                    from absensi
                    WHERE absensi.id IN (
                        SELECT MAX(absensi.id) FROM absensi
                        WHERE absensi.id_user = '".$request->id_user."'
                    )
                ");
        // dd($absensiId);

        $absensi = DB::table('absensi')
                ->where('id', '=', $absensiId[0]->id)
                ->update([
                    'waktu_keluar'   => $request->input('waktu_keluar')
                ]);

        if($absensi) {
            return response()->json([
                'status' => 1,
                'message' => 'Data checkout Berhasil Disimpan',
                'dataCheckout' => $absensi
            ], 200);
        }else {
            return response()->json([
                'status' => 0,
                'message' => 'Data checkout Gagal Disimpan'                                     
            ], 200);
        }
    }

    public function izin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'sampai_tanggal' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 0,
                'message' => $validator->errors()
            ], 200);
        }

        $izin = Izin::create([
            'id_user' => $request->input('id_user'),
            'tanggal' => $request->input('tanggal'),
            'sampai_tanggal' => $request->input('sampai_tanggal'),
            'keterangan' => $request->input('keterangan')
        ]);

        if($izin) {
            return response()->json([
                'status' => 1,
                'message' => 'Data Izin Berhasil Disimpan',
                'dataIzin' => $izin
            ], 200);
        }else {
            return response()->json([
                'status' => 0,
                'message' => 'Data Izin Gagal Disimpan'                                     
            ], 200);
        }
    }

    public function izinList() {
        $izin = Izin::select('users.nama', 'users.nik', 'level_users.nama_level', 'izin.id','izin.keterangan','izin.id_user')
                    ->join('users', 'users.id', 'izin.id_user')
                    ->join('level_users', 'level_users.id', 'users.id_level')
                    ->where('level_users.id', '!=', 2)
                    ->where('izin.status', 0)
                    ->get();
        // dd($izin);

        if($izin) {
            return response()->json([
                'status' => 1,
                'message' => 'Data Izin Karyawan',
                'dataIzinList' => $izin
            ], 200);
        }else {
            return response()->json([
                'status' => 0,
                'message' => 'Gagal Get Data Izin Karyawan'                                     
            ], 200);
        }
    }

    public function izinApprove(Request $request) {

        $date = Carbon::now()->format('Y-m-d');
        $time = Carbon::now()->format('H:i:s');

        $izinId = DB::select("
                    select id
                    from izin
                    WHERE izin.id IN (
                        SELECT MAX(izin.id) FROM absensi
                        WHERE izin.id_user = '".$request->id_user."'
                        AND status = 0
                    )
                ");

        $approve = DB::table('izin')
                    ->where('id', '=', $izinId[0]->id)
                    ->update([
                        'status'        => 1,
                        'approve_by'    => $request->approve_by,
                        'approve_date'  => $date." ".$time
                    ]);

        if($approve) {
            return response()->json([
                'status' => 1,
                'message' => 'Izin Berhasil Di-approve',
                'dataIzinApprove' => $approve
            ], 200);
        }else {
            return response()->json([
                'status' => 0,
                'message' => 'Izin Gagal Di-approve'                                     
            ], 200);
        }
        
    }

    public function izinApprove_(Request $request) {

        $date = Carbon::now()->format('Y-m-d');
        $time = Carbon::now()->format('H:i:s');

        $izinId = DB::select("
                    select id
                    from izin
                    WHERE izin.id IN (
                        SELECT MAX(izin.id) FROM absensi
                        WHERE izin.id_user = '".$request->id_user."'
                        AND status = 0
                    )
                ");

        $approve = DB::table('izin')
                    ->where('id', '=', $izinId[0]->id)
                    ->update([
                        'status'        => $request->input("status"),
                        'approve_date'  => $date." ".$time
                    ]);

        if($approve) {
            return response()->json([
                'status' => 1,
                'message' => 'Izin Berhasil Di-approve',
                'dataIzinApprove' => $approve
            ], 200);
        }else {
            return response()->json([
                'status' => 0,
                'message' => 'Izin Gagal Di-approve'                                     
            ], 200);
        }
        
    }

    public function sakit(Request $request) {
        $data = $request->all();

        $surat = $request->foto_surat_sakit; 
        $surat = str_replace('data:image/png;base64,', '', $surat);
        $surat = str_replace(' ', '+', $surat);
        $suratx = md5(uniqid(rand(), true));
        $suratName = $suratx.'.'.'jpg';

        Storage::disk('surat')->put($suratName, base64_decode($surat)); 

        $sakit = Sakit::create([
                    'id_user'           => $data['id_user'],
                    'tanggal'           => $data['tanggal'],
                    'sampai_tanggal'    => $data['sampai_tanggal'],
                    'foto_surat_sakit'  => "/images/absensi/sakit/".$suratName
                ]);

        if($sakit) {
            return response()->json([
                'status' => 1,
                'message' => 'Data Sakit Berhasil Disimpan',
                'dataSakit' => $sakit
            ], 200);
        }else {
            return response()->json([
                'status' => 0,
                'message' => 'Data Sakit Gagal Disimpan'                                     
            ], 200);
        }
    }

    public function absensiHisList() {

        $absensi = Absensi::select('users.nama', 'users.nik', 'level_users.nama_level', 'absensi.id','absensi.id_user','absensi.waktu_masuk')
                    ->join('users', 'users.id', 'absensi.id_user')
                    ->join('level_users', 'level_users.id', 'users.id_level')
                    ->where('level_users.id', '!=', 2)
                    ->get();
        // dd($absensi);

        if($absensi) {
            return response()->json([
                'status' => 1,
                'message' => 'Data Karyawan',
                'dataAbsensiList' => $absensi
            ], 200);
        }else {
            return response()->json([
                'status' => 0,
                'message' => 'Gagal Get Data Karyawan'                                     
            ], 200);
        }
    }

    public function absensiHis($date_now) {

        $month =  Carbon::now()->format("m");

        $history = Absensi::select('users.nama', 'users.nik', 'level_users.nama_level', 'absensi.id', 'absensi.tanggal', 'absensi.waktu_masuk', 'absensi.waktu_keluar','absensi.id_user')
                    ->join('users', 'users.id', 'absensi.id_user')
                    ->join('level_users', 'level_users.id', 'users.id_level')
                    ->where('absensi.tanggal', '=', $date_now)
                    ->get();
        // dd($history);

        if($history) {
            return response()->json([
                'status' => 1,
                'message' => 'Data Absensi History Karyawan',
                'dataAbsensi' => $history
            ], 200);
        }else {
            return response()->json([
                'status' => 0,
                'message' => 'Gagal Get Data History Karyawan'                                     
            ], 200);
        }
    }

    public function dinas(Request $request) {
        $data = $request->all();

        $surat = $request->foto_surat_dinas; 
        $surat = str_replace('data:image/png;base64,', '', $surat);
        $surat = str_replace(' ', '+', $surat);
        $suratx = md5(uniqid(rand(), true));
        $suratName = $suratx.'.'.'jpg';

        Storage::disk('surat')->put($suratName, base64_decode($surat)); 

        $dinas = Dinas::create([
                    'id_user'           => $data['id_user'],
                    'tanggal'           => $data['tanggal'],
                    'sampai_tanggal'    => $data['sampai_tanggal'],
                    'foto_surat_dinas'  => "/images/absensi/sakit/".$suratName
                ]);

        if($dinas) {
            return response()->json([
                'status' => 1,
                'message' => 'Data Dinas Berhasil Disimpan',
                'dataDinas' => $dinas
            ], 200);
        }else {
            return response()->json([
                'status' => 0,
                'message' => 'Data Dinas Gagal Disimpan'                                     
            ], 200);
        }
    }


}