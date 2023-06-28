<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\DetailUser;
use App\Models\DetailProduct;
use App\Models\Transaksi;
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

    public function review(Request $request) {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required',
            'id_product' => 'required',
            'review' => 'required',
            'rating' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 0,
                'user' => $validator->errors()
            ],401);
        }

        $user = DetailProduct::where([
            ['id_user', $request->id_user],
            ['id_product', $request->id_product]
        ])->first();
        
        if($user) {
                return response()->json([
                    'status' => 0,
                    'message' => 'anda sudah memberikan ulasan'
                ],200);
        }else {
                $detailProduct = DetailProduct::create([
                'id_product' => $request->input('id_product'),
                'id_user' => $request->input('id_user'),
                'nama_user' => $request->input('nama_user'),
                'review' => $request->input('review'),
                'rating' => $request->input('rating'),
            ]);

            if ($detailProduct) {
                return response()->json([
                    'status' => 1,
                    'message' => "Berhasil menambahkan Review",
                    'dataDetailProductReview' => $detailProduct,
                ], 200);
            }else {
                return response()->json([
                    'status' => 0,
                    'message' => "Gagal menambahkan Review"                                         
                ], 401);
            }
        
        }
    }

    public function requestPayment(Request $request) {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required',
            'id_product' => 'required',
            'tanggal' => 'required',
            'alamat' => 'required',
            'bukti_pembayaran' => 'required',
            'status' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 0,
                'transaksi' => $validator->errors()
            ],401);
        }else{
            $surat = $request->foto; 
            $surat = str_replace('data:image/png;base64,', '', $surat);
            $surat = str_replace(' ', '+', $surat);
            $suratx = md5(uniqid(rand(), true));
            $suratName = $suratx.'.'.'jpg';

            Storage::disk('product')->put($suratName, base64_decode($surat)); 

            $transaksi = Transaksi::create([
                'id_user' => $request->input('id_user'),
                'id_product' => $request->input('id_product'),
                'tanggal' => $request->input('tanggal'),
                'alamat' => $request->input('alamat'),
                'bukti_pembayaran' => "/images/jasa/product/".$suratName,
                'status' => $request->input('status'),
            ]);

            if ($transaksi) {
                return response()->json([
                    'status' => 1,
                    'message' => "Transaksi Success",
                    'transaksi' => $transaksi,
                ], 200);
            }else {
                return response()->json([
                    'status' => 0,
                    'message' => "Transaksi Failed"                                         
                ], 401);
            }
        }
    }

    public function updateProfile(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'nama'      => 'nullable',
            'email'     => 'nullable',
            'nomor_hp'  => 'nullable',
            'alamat'    => 'nullable',
            'foto'   => 'nullable'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 0,
                'message' => $validator->errors()
            ], 200);
        }

        $foto = $request->foto; 
        $foto = str_replace('data:image/png;base64,', '', $foto);
        $foto = str_replace(' ', '+', $foto);
        $fotox = md5(uniqid(rand(), true));
        $fotoname = $fotox.'.'.'jpg';

        Storage::disk('upload')->put($fotoname, base64_decode($foto)); 

        $update = DB::table('users')->where('id', $id)->update([
            'nama'      => $request->nama,
            'email'     => $request->email,
            'nomor_hp'  => $request->nomor_hp,
            'alamat'    => $request->alamat,
            'foto'    => "/images/jasa/avatar/".$fotoname
        ]);

        if($update) {
            $updatedProfile = DB::table('users')->where('id', $id)->first();
            return response()->json([
                'message' => 'Data Berhasil Di-Update',
                'status' => 1,
                'profilUpdate' => $updatedProfile
            ], 200);
        }else {
            return response()->json([
                'message' => 'Data Gagal Di-Update',
                'status' => 0                                        
            ], 200);
        }
        
    }

    public function getReview($id_product) {
        $review = DetailProduct::select('detail_foto_product.id','detail_foto_product.id_product','detail_foto_product.id_user','users.nama','detail_foto_product.review','detail_foto_product.rating','users.foto')
                    ->join('users', 'users.id', 'detail_foto_product.id_user')
                    ->where('detail_foto_product.id_product','=',$id_product)
                    ->get();
        // dd($izin);

        if($review->isEmpty()) {
            return response()->json([
                'status' => 0,
                'message' => 'Gagal Get Data Review'                                     
            ], 200);
        } else {
            return response()->json([
                'status' => 1,
                'message' => 'Data Review',
                'dataReview' => $review
            ], 200);
        }
    }

    public function getKatalog() {
        $katalogAll = Product::select('product.id','product.id_user','users.nama', 'product.foto', 'product.judul_product','product.harga_product')
                    ->join('users', 'users.id', 'product.id_user')
                    ->get();
        // dd($izin);

        if($katalogAll) {
            return response()->json([
                'status' => 1,
                'message' => 'Data Katalog',
                'dataKatalog' => $katalogAll
            ], 200);
        }else {
            return response()->json([
                'status' => 0,
                'message' => 'Gagal Get Data Katalog'                                     
            ], 200);
        }
    }

    public function getKatalogById($id_user) {
        $katalogAll = Product::select('product.id','product.id_user','users.nama', 'product.foto','product.foto_two','product.foto_three', 'product.judul_product','product.harga_product','product.domisili','product.deskripsi','product.nomor_whatsapp')
                    ->join('users', 'users.id', 'product.id_user')
                    ->where('users.id','=',$id_user)
                    ->get();
        // var_dump($katalogAll);

        if($katalogAll->isEmpty()) {
            return response()->json([
                'status' => 0,
                'message' => 'Gagal Get Data Katalog'                                     
            ], 200);
        } else {
            return response()->json([
                'status' => 1,
                'message' => 'Data Katalog',
                'dataKatalog' => $katalogAll
            ], 200);
        }
    }

    public function getProfile($id) {
        $profile = User::find($id);

        if($profile) {
            return response()->json([
                'status' => 1,
                'message' => "data profile ditemukan",
                'dataProfile' => $profile,
            ], 200);
        }else {
            return response()->json([
                'status' => 0                                           
            ], 401);
        }
    }

    public function getPayment() {
        $paymentAll = Transaksi::select('transaksi.id','transaksi.id_user','transaksi.tanggal','transaksi.alamat','transaksi.bukti_pembayaran','transaksi.status','users.nama','users.email','product.judul_product','product.harga_product')
                    ->join('users', 'users.id', 'transaksi.id_user')
                    ->join('product','product.id','transaksi.id_product')
                    ->where('transaksi.status','=','sudah transfer')
                    ->get();
        // var_dump($katalogAll);

        if($paymentAll->isEmpty()) {
            return response()->json([
                'status' => 0,
                'message' => 'Gagal Get Data Payment'                                     
            ], 200);
        } else {
            return response()->json([
                'status' => 1,
                'message' => 'Data Payment',
                'dataPayment' => $paymentAll
            ], 200);
        }
    }

    public function getPaymentByIdProduct($id,$id_user) {
        $paymentAll = Transaksi::select('transaksi.id','transaksi.id_user','transaksi.tanggal','transaksi.alamat','transaksi.bukti_pembayaran','transaksi.status','users.nama','users.email','product.judul_product','product.harga_product')
                    ->join('users', 'users.id', 'transaksi.id_user')
                    ->join('product','product.id','transaksi.id_product')
                    ->where('transaksi.id_product','=',$id)
                    ->where('transaksi.id_user','=',$id_user)
                    ->get();
        // var_dump($katalogAll);

        if($paymentAll->isEmpty()) {
            return response()->json([
                'status' => 0,
                'message' => 'Gagal Get Data Payment'                                     
            ], 200);
        } else {
            return response()->json([
                'status' => 1,
                'message' => 'Data Payment',
                'dataPaymentById' => $paymentAll
            ], 200);
        }
    }

    public function getPaymentFotoGrapher() {
        $paymentAll = Transaksi::select('transaksi.id','transaksi.id_user','transaksi.tanggal','transaksi.alamat','transaksi.bukti_pembayaran','transaksi.status','users.nama','users.email','product.judul_product','product.harga_product')
                    ->join('users', 'users.id', 'transaksi.id_user')
                    ->join('product','product.id','transaksi.id_product')
                    ->where('transaksi.status','=','pembayaran berhasil')
                    ->get();
        // var_dump($katalogAll);

        if($paymentAll->isEmpty()) {
            return response()->json([
                'status' => 0,
                'message' => 'Gagal Get Data Payment'                                     
            ], 200);
        } else {
            return response()->json([
                'status' => 1,
                'message' => 'Data Payment',
                'dataPaymentFoto' => $paymentAll
            ], 200);
        }
    }

    public function updatePayment(Request $request, $id) {

        $update = DB::table('transaksi')->where('id', $id)->update([
            'status'      => $request->status
        ]);

        if($update) {
            $updatedProfile = DB::table('transaksi')->where('id', $id)->first();
            return response()->json([
                'message' => 'Data Berhasil Di-Update',
                'status' => 1,
                'statusChange' => $updatedProfile
            ], 200);
        }else {
            return response()->json([
                'message' => 'Data Gagal Di-Update',
                'status' => 0                                        
            ], 200);
        }
        
    }
}