<!DOCTYPE html>
<html>
<head>
	<title>Data Report</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Data Report</h4>
	</center>
 
  <table class='table table-bordered'>
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>                                 
                <tr>
                  <th width="100px">NAMA</th>
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
 
</body>
</html>