@extends('layouts.master')

@section('title', 'Absensi')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
        <span><h3>Absensi Dinas</h3></span>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>                                 
                <tr>
                  <th width="50px">NO</th>
                  <th width="200px">NAMA</th>
                  <th width="100px">NIK</th>
                  <th width="100px">TANGGAL</th>
                  <th width="100px">SAMPAI TANGGAL</th>
                  <th width="100px">SURAT DINAS</th>
                </tr>
              </thead>
              <tbody>                                 
                <?php $i = 1; ?>
                                      
                @foreach($dinas as $item)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->nik }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->sampai_tanggal }}</td>
                    <td><img src="{{ $item->foto_surat_dinas }}" class="path" width="50" height="50"></td>
                    <!-- <td><img src="{{ $item->foto_surat_sakit }}" class="path" width="50" height="50" data-toggle="modal" data-target="#exampleModal" onclick="bukamodal('{{ $item->foto_surat_sakit }}')"></td> -->
                  </tr>
                @endforeach 
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