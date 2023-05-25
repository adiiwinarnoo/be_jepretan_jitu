@extends('layouts.master')

@section('title', 'Users')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">

        <a href="{{ route('users.create') }}" class="create-modal btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus"></i> Add User
        </a>
            
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>                                 
                <tr>
                  <th width="50px">NO</th>
                  <th width="200px">NAMA</th>
                  <th width="100px">NIK</th>
                  <th width="100px">LEVEL</th>
                  <th class="text-center" width="150px">ACTION</th>
                </tr>
              </thead>
              <tbody>                                 
                <?php $i = 1; ?>
                                      
                @foreach($users as $item)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->nik }}</td>
                    <td>{{ $item->nama_level }}</td>
                    <td class="text-center">
                      <a href="{{ route('users.show', ['id' => $item->id]) }}" class="show-modal btn btn-info btn-sm">
                        <i class="fa fa-eye"></i>
                      </a>
                      <a href="{{ route('users.edit', ['id' => $item->id]) }}" class="edit-modal btn btn-warning btn-sm">
                        <i class="fas fa-pen"></i>
                      </a>
                    </td>
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