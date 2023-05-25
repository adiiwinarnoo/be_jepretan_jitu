@extends('layouts.master')

@section('title', 'Report')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <span><h3>{{ $date_." ".$year}}</h3></span>
        </div>
        <div class="card-body">
        <a href="{{ route('cetak') }}" class="btn btn-primary" target="_blank">CETAK PDF</a>
		<table class='table table-bordered'>
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>                                 
                <tr>
                  <th width="200px">NAMA</th>
                  <th width="100px">NIK</th>
                  <th width="100px">LEVEL</th>
                  <th width="100px">HADIR</th>
                  <th width="100px">IZIN</th>
                  <th width="100px">SAKIT</th>
                  <th width="100px">DINAS</th>
                </tr>
              </thead>
              <tbody>                                 
                          
                @for($i = 0; $i < sizeof($dashboard); $i++)
                  <tr>
                    <td>{{ $dashboard[$i]['nama'] }}</td>
                    <td>{{ $dashboard[$i]['nik'] }}</td>
                    <td>{{ $dashboard[$i]['level'] }}</td>
                    <td>{{ $dashboard[$i]['hadir'] }}</td>
                    <td>{{ $dashboard[$i]['izin'] }}</td>
                    <td>{{ $dashboard[$i]['sakit'] }}</td>
                    <td>{{ $dashboard[$i]['dinas'] }}</td>
                  </tr>
                @endfor
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#table-1').DataTable();
  });
</script>