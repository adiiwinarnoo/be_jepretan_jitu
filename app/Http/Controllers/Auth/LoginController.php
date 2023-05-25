<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use DB;

class LoginController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function postLogin(Request $request) {
        // dd($request->all());

        $query = DB::table('users')
                ->select('*')
                ->where('nik', $request->nik)
                ->first();
        // dd($query->id_level);

        if($query->id_level == 1) {
            if(Auth::attempt([
                'nik'       => $request->nik,
                'password'  => $request->password
            ])) {
                Session::put('login', TRUE);
                return redirect('hrd/dashboard');
            }
            return redirect('login')->with('alert', 'Password atau NIK, Salah!');
        }else{
            return redirect('login')->with('alert', 'Role User Tidak Sesuai!');
        }
    }

    public function logout() {
        Session::flush();
        return redirect('login')->with('alert-success', 'Anda sudah logout');
    }
}
