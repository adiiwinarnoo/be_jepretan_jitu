@extends('layouts.master')

@section('title', 'Users')

@section('page-header')
  <h1>Detail User</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active">Dashboard</a></div>
    <div class="breadcrumb-item">User Management</a></div>
    <div class="breadcrumb-item">Users</div>
  </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Detail User</h4>
                </div>
                <div class="card-body">
                
                    <form action="" enctype="multipart/form-data" id="form">
                      <div class="form-group">
                          <label>Nama</label>
                          <input type="text" name="nama" class="form-control" value="{{$user->nama}}" readonly>
                      </div>
                      <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control" value="{{$user->nik}}" readonly>
                      </div>
                      <div class="form-group">
                        <label>Level</label>
                        <input type="text" name="level" class="form-control" value="{{$user->nama_level}}" readonly>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{$user->email}}" readonly>
                      </div>
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="{{$user->username}}" readonly>
                      </div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{$user->alamat}}" readonly>
                      </div>
                      <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" name="telepon" class="form-control" value="{{$user->telepon}}" readonly>
                      </div>
                      <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status" style="width: 100%;" readonly>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                     </div>
                    </form>
             
                </div>
            </div>
        </div>
    </div>

@endsection
