<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>ABSENSI - @yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset ('stisla/assets/modules/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset ('stisla/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset ('stisla/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset ('stisla/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset ('stisla/assets/css/components.css') }}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      @include('layouts.navbar')

      @include('layouts.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        @yield('content') 
      </div>

    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset ('stisla/assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset ('stisla/assets/modules/popper.js') }}"></script>
  <script src="{{ asset ('stisla/assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset ('stisla/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset ('stisla/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset ('stisla/assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset ('stisla/assets/js/stisla.js') }}"></script>
  
  <!-- JS Libraies -->
  <script src="{{ asset ('stisla/assets/modules/datatables/datatables.min.js') }}"></script>
  <script src="{{ asset ('stisla/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset ('stisla/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
  <script src="{{ asset ('stisla/assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>

  <!-- Template JS File -->
  <script src="{{ asset ('stisla/assets/js/scripts.js') }}"></script>
  <script src="{{ asset ('stisla/assets/js/custom.js') }}"></script>

  <!-- Page Specific JS File -->
</body>
</html>


