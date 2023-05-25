<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\DetailUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required',
            'nomor_hp' => 'required',
            'alamat' => 'required',
            'password' => 'required|min:8',
            'id_level' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 0,
                'user' => $validator->errors()
            ],200);
        }

        $user = User::where('email', $request->email)->first();
        
        if($user) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Email anda Sudah Terdaftar'
                ],200);
        }else {
            $surat = $request->foto; 
            $surat = str_replace('data:image/png;base64,', '', $surat);
            $surat = str_replace(' ', '+', $surat);
            $suratx = md5(uniqid(rand(), true));
            $suratName = $suratx.'.'.'jpg';

            Storage::disk('product')->put($suratName, base64_decode($surat)); 

            $user = User::create([
                'nama' => $request->input('nama'),
                'email' => $request->input('email'),
                'nomor_hp' => $request->input('nomor_hp'),
                'alamat' => $request->input('alamat'),
                'password' => Hash::make($request->input('password')),
                'foto' => "/images/absensi/product/".$suratName,
                'id_level' => $request->input('id_level'),
            ]);

            if ($user) {
                return response()->json([
                    'status' => 1,
                    'dataUser' => $user,
                ], 200);
            }else {
                return response()->json([
                    'status' => 0                                           
                ], 401);
            }
        
        }
    }

    public function login(Request $request) {
        
        $status = User::all('status');
        
        $validator = Validator::make($request->all(), [
            'nik' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 0,
                'user' => $validator->errors()
            ], 401);
        }

        $user = User::where('nik', $request->nik)->first();
        if(!$user) {
            return response()->json([
                'status' => 0,
                'message' => 'NIK Tidak Terdaftar'
            ], 401);
        }
        
        if(Auth::attempt($request->only('nik','password'))){
            if (Auth::user()->status == 1) {
                return response()->json([
                                        'status' => 1,
                                        'message' => "Login Berhasil",
                                        'dataLogin' => $user
                                    ], 200);
            } else {
                return response()->json([
                                    'status' => 1,
                                    'message' => "Akun Belum Diaktivasi",
                                    'dataLogin' => $user
                                ], 200);
            }
        }else{
            return response()->json([
                'status' => 0,
                'message' => "Password Tidak Sesuai"                                     
            ], 401);
        }
    }

    public function forgotPasssword(Request $request) {
        $validator = Validator::make($request->all(), [
            'nik' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 0,
                'user' => $validator->errors()
            ], 401);
        }

        $user = User::where('nik', $request->nik)->first();
        
        if($user){
            $user = User::where('nik', $request->nik)->first();
            $user->password = Hash::make($request->password);
            $user->update();
            return response()->json([
                'message' => 'Password Berhasil Diubah',
                'status' => 1,
                'dataPassword' => $user
            ], 200);
        }else {
            return response()->json([
                'message' => 'NIK Tidak Terdaftar, Password Gagal Diubah',
                'status' => 0
            ], 401);
        }
    }
}