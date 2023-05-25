@extends('layouts.auth')

@section('title', 'Login')

@section('content')

<div class="container mt-5">
  <div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
      <div class="login-brand">
        <h4>ABSENSI</h4>
        <!-- <img src="{{ asset ('assets/img/logo.png') }}" alt="logo" width="150" class="shadow-light"> -->
      </div>

      <div class="card card-primary">
        <div class="card-header"><h4>Login</h4></div>
        
        @if(\Session::has('alert'))
        <div class="alert alert-danger">
            <div>{{Session::get('alert')}}</div>
        </div>
        @endif
        @if(\Session::has('alert-success'))
            <div class="alert alert-success">
                <div>{{Session::get('alert-success')}}</div>
            </div>
        @endif

        @if(\Session::has('success'))
            <div class="alert alert-success">
                <div>{{Session::get('success')}}</div>
            </div>
        @endif
        @if(\Session::has('error'))
            <div class="alert alert-danger">
                <div>{{Session::get('error')}}</div>
            </div>
        @endif
        
        <div class="card-body">
          <form method="POST" action="{{ route('postLogin') }}" class="needs-validation" novalidate="">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="nik">NIK</label>
              <input id="nik" type="text" class="form-control" name="nik" tabindex="1" required autofocus>
              <div class="invalid-feedback">
                Please fill in your NIK
              </div>
            </div>

            <div class="form-group">
              <div class="d-block">
                <label for="password" class="control-label">Password</label>
              </div>
              <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
              <div class="invalid-feedback">
                please fill in your Password
              </div>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                Login
              </button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection