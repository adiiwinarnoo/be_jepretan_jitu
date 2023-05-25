@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <span><h3>{{ $date }}</h3></span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>HADIR</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <tr>
                                        <th width="100px">NAMA</th>
                                        <th width="100px">NIK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($hadir as $item)                                   
                                        <tr>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->nik }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>IZIN</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <tr>
                                        <th width="100px">NAMA</th>
                                        <th width="100px">NIK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($izin as $item)                                   
                                        <tr>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->nik }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>SAKIT</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <tr>
                                        <th width="100px">NAMA</th>
                                        <th width="100px">NIK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sakit as $item)                                   
                                        <tr>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->nik }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>DINAS</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <tr>
                                        <th width="100px">NAMA</th>
                                        <th width="100px">NIK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dinas as $item)                                   
                                        <tr>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->nik }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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