@extends('layouts.master')

@section('title', 'Users')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('page-header')
  <h1>Users Edit</h1>
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
                    <h4>Edit User</h4>
                    <a href="{{ url()->previous() }}" class="d-none d-sm-inline-block btn  btn-success shadow-sm">
                        <i class="fas fa-list"></i> Return To List
                    </a>
                </div>
                <div class="card-body">
      
                    <form action="{{ route('users.update') }}" method="post" enctype="multipart/form-data" id="form">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}

                        <div class="form-group">
                            <label for='nama'>Nama</label>
                            <input type="text" name="nama" class="form-control nama {{ $errors->has('nama') ? 'is-invalid':'' }}" value="{{$user->nama}}">
                            <p class="text-danger">{{ $errors->first('nama') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" name="nik" class="form-control nik {{ $errors->has('nik') ? 'is-invalid':'' }}" value="{{ $user->nik }}" readonly>
                            <p class="text-danger">{{ $errors->first('nik') }}</p>
                        </div>
                        <div class="form-group">
                        <label for="role_id">Level</label>
                        <select name="id_level" class="form-control level {{ $errors->has('id_level') ? 'is-invalid':'' }}">
                            <option value="{{$user->id_level}}">{{$user->nama_level}}</option>
                            @foreach ($level as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_level }}</option>
                            @endforeach
                        </select>
                        <p class="text-danger">{{ $errors->first('nama_level') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control email {{ $errors->has('email') ? 'is-invalid':'' }}" value="{{ $user->email }}">
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control username {{ $errors->has('username') ? 'is-invalid':'' }}" value="{{ $user->username }}">
                            <p class="text-danger">{{ $errors->first('username') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="alamat" name="alamat" class="form-control  alamat {{ $errors->has('alamat') ? 'is-invalid':'' }}" value="{{ $user->alamat }}">
                            <p class="text-danger">{{ $errors->first('alamat') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="telepon" name="telepon" class="form-control telepon {{ $errors->has('telepon') ? 'is-invalid':'' }}" value="{{ $user->telepon }}">
                            <p class="text-danger">{{ $errors->first('telepon') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status" style="width: 100%;" required>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <button class="btn btn-primary update" id="update">Update</button>
                    </form>
    
                </div>
            </div>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
        $('#table-1').DataTable();
    });
    
 </script>

@endsection