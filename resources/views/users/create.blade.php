@extends('layouts.master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title', 'Users')

@section('page-header')
    <h1>Users Add</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">User Management</a></div>
        <div class="breadcrumb-item">Users</div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Users Add</h4>
                </div>
                @if(\Session::has('alert'))
                <div class="alert alert-danger">
                    <div>{{Session::get('alert')}}</div>
                </div>
                @endif
                <div class="card-body">
                    @if($errors->any())
                        <center><h3 style="color: #F1421C;">{{$errors->first()}}</h3></center>   
                    @endif
                    <form action="/hrd/users/store" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                         
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}" required value="">
                            <p class="text-danger">{{ $errors->first('nama') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="">NIK</label>
                            <input type="text" name="nik" class="form-control {{ $errors->has('nik') ? 'is-invalid':'' }}" required value="">
                            <p class="text-danger">{{ $errors->first('nik') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="">Levels</label>
                            <select name="id_level" class="form-control {{ $errors->has('nama_level') ? 'is-invalid':'' }}" id="id_level" required>
                            <option value="">None</option>
                                @foreach ($level as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_level }}</option>
                                @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('id_level') }}</p>
                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}" required value="">
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                        </div>

                        <button name="simpan" id="simpan" type="submit" class="btn btn-primary submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $(document).ready(function(){
            $('#table-1').DataTable();
        });
        
    </script>
@endsection

