<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
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
            'alamat' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 0,
                'user' => $validator->errors()
            ],401);
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
                'foto' => "/images/jasa/product/".$suratName,
                'id_level' => $request->input('id_level'),
            ]);

            if ($user) {
                return response()->json([
                    'status' => 1,
                    'message' => "Register Success",
                    'dataUser' => $user,
                ], 200);
            }else {
                return response()->json([
                    'status' => 0,
                    'message' => "Register Failed"                                         
                ], 401);
            }
        
        }
    }

    public function login(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 0,
                'user' => $validator->errors()
            ], 401);
        }

        $user = User::where('email', $request->email)->first();
        if(!$user) {
            return response()->json([
                'status' => 0,
                'message' => 'Email Tidak Terdaftar'
            ], 401);
        }
        
        if(Auth::attempt($request->only('email','password'))){
            return response()->json([
                'status' => 1,
                'message' => "Login Berhasil",
                'dataLogin' => $user
            ], 200);
        }else{
            return response()->json([
                'status' => 0,
                'message' => "Password Tidak Sesuai"                                     
            ], 401);
        }
    }

    public function forgotPasssword(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 0,
                'user' => $validator->errors()
            ], 401);
        }

        $user = User::where('email', $request->email)->first();
        
        if($user){
            $user = User::where('email', $request->email)->first();
            $user->password = Hash::make($request->password);
            $user->update();
            return response()->json([
                'message' => 'Password Berhasil Diubah',
                'status' => 1,
                'dataPassword' => $user
            ], 200);
        }else {
            return response()->json([
                'message' => 'Email Tidak Terdaftar, Password Gagal Diubah',
                'status' => 0
            ], 401);
        }
    }

    // uploadkatalog
    public function uploadKatalog(Request $request) {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required',
            'foto' => 'required',
            'foto_two' => 'required',
            'foto_three' => 'required',
            'domisili' => 'required',
            'nomor_whatsapp' => 'required',
            'judul_product' => 'required',
            'harga_product' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 0,
                'katalog' => $validator->errors()
            ],401);
        }

        $user = Product::where('id_user', $request->id_user)->first();
        
        if($user) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Maaf anda sudah mendaftarkan katalog anda!'
                ],200);
        }else {
            $surat = $request->foto; 
            $surat = str_replace('data:image/png;base64,', '', $surat);
            $surat = str_replace(' ', '+', $surat);
            $suratx = md5(uniqid(rand(), true));
            $fotoName = $suratx.'.'.'jpg';

            $suratTwo = $request->foto_two; 
            $suratTwo = str_replace('data:image/png;base64,', '', $suratTwo);
            $suratTwo = str_replace(' ', '+', $suratTwo);
            $suratxTwo = md5(uniqid(rand(), true));
            $fotoNameTwo = $suratxTwo.'.'.'jpg';


            $suratThree = $request->foto_three; 
            $suratThree = str_replace('data:image/png;base64,', '', $suratThree);
            $suratThree = str_replace(' ', '+', $suratThree);
            $suratxThree = md5(uniqid(rand(), true));
            $fotoNameThree = $suratxThree.'.'.'jpg';

            Storage::disk('product')->put($fotoName, base64_decode($surat)); 
            Storage::disk('product')->put($fotoNameTwo, base64_decode($suratTwo)); 
            Storage::disk('product')->put($fotoNameThree, base64_decode($suratThree)); 

            $user = Product::create([
                'id_user' => $request->input('id_user'),
                'judul_product' => $request->input('judul_product'),
                'nomor_whatsapp' => $request->input('nomor_whatsapp'),
                'domisili' => $request->input('domisili'),
                'deskripsi' => $request->input('deskripsi'),
                'harga_product' => $request->input('harga_product'),
                'foto' => "/images/jasa/product/".$fotoName,
                'foto_two' => "/images/jasa/product/".$fotoNameTwo,
                'foto_three' => "/images/jasa/product/".$fotoNameThree,
                
            ]);

            if ($user) {
                return response()->json([
                    'status' => 1,
                    'message' => "Upload katalog anda berhasil",
                    'dataUser' => $user,
                ], 200);
            }else {
                return response()->json([
                    'status' => 0,
                    'message' => "Upload katalog anda gagal"                                         
                ], 401);
            }
        
        }
    }
}