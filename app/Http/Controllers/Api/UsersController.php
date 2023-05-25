<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Str;
use DB;

class UsersController extends Controller
{
    public function getProfile($id) {
        $profile = User::find($id);

        if($profile) {
            return response()->json([
                'status' => 1,
                'dataProfile' => $profile,
            ], 200);
        }else {
            return response()->json([
                'status' => 0                                           
            ], 401);
        }
    }

    public function updateProfile(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'nama'      => 'nullable',
            'email'     => 'nullable',
            'username'  => 'nullable',
            'alamat'    => 'nullable',
            'telepon'   => 'nullable',
            'avatar'    => 'nullable'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 0,
                'message' => $validator->errors()
            ], 200);
        }

        $avatar = $request->avatar; 
        $avatar = str_replace('data:image/png;base64,', '', $avatar);
        $avatar = str_replace(' ', '+', $avatar);
        $avatarx = md5(uniqid(rand(), true));
        $avatarName = $avatarx.'.'.'jpg';

        Storage::disk('upload')->put($avatarName, base64_decode($avatar)); 

        $update = DB::table('users')->where('id', $id)->update([
            'nama'      => $request->nama,
            'email'     => $request->email,
            'username'  => $request->username,
            'alamat'    => $request->alamat,
            'telepon'   => $request->telepon,
            'avatar'    => "/images/absensi/avatar/".$avatarName
        ]);

        if($update) {
            return response()->json([
                'message' => 'Data Berhasil Di-Update',
                'status' => 1,
                'profilUpdate' => $update
            ], 200);
        }else {
            return response()->json([
                'message' => 'Data Gagal Di-Update',
                'status' => 0                                        
            ], 200);
        }
        
    }
    

}
