<?php

namespace App\Http\Controllers\Hrd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Level;
use DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index() {
        $users = User::select('users.id', 'nama', 'nik', 'level_users.nama_level')
                        ->join('level_users', 'level_users.id', 'users.id_level')
                        ->get();
        // dd($users);
        
        return view('users.index', compact('users'));
    }

    public function create() {
      
        $level=Level::all();
        
        return view('users.create', compact('level'));
      
    }

    public function store(Request $request)
    {
       
        $data = $request->all();

        $save = DB::table('users')->insert([
                    'nama'      => $data['nama'],
                    'nik'       => $data['nik'],
                    'id_level'  => $data['id_level'],
                    'password'  => Hash::make($data['password']),
                ]);

        return redirect()->route('users')->with(['success' => 'User Berhasil Ditambahkan']);
    }

    public function show($id)
    {
        $user = DB::table('users')
                ->select('users.*', 'level_users.nama_level')
                ->join('level_users', 'level_users.id', 'users.id_level')
                ->where('users.id', $id)
                ->first();
        // dd($user);
                        
        return view('users.view', compact('user'));
    }

    public function edit($id)
    { 
        $level=Level::all();

        $user = DB::table('users')
                ->select('users.*', 'level_users.nama_level')
                ->join('level_users', 'level_users.id', 'users.id_level')
                ->where('users.id', $id)
                ->first();
        // dd($user);
                        
        return view('users.edit', compact('user', 'level'));
    }

    public function update(Request $request) {

        // dd($request->all());
       
        DB::table('users')
            ->where('id', '=', $request->id)
            ->update([
                'nama'      => $request->nama,
                'email'     => $request->email,
                'nik'       =>  $request->nik,
                'username'  => $request->username,
                'alamat'    => $request->alamat,
                'telepon'   => $request->telepon,
                'id_level'  => $request->id_level,
                'status'    => $request->status,
            ]);

        return redirect('/hrd/users')->with(['success' => 'User Berhasil di Update']);
    }

}
