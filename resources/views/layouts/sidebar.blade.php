<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">ABSENSI</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">SA</a>
    </div>

    <ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
      <a href="{{ route('dashboard') }}" class="nav-link has-dropdown"><span>Dashboard</span></a>
    </li>
    <li class="menu-header">Kelola Users</li>
    <li><a class="nav-link" href="{{ route('users') }}">Users</a></li>
    <li class="menu-header">Absensi</li>
    <li><a class="nav-link" href="{{ route('hadir') }}">Hadir</a></li>
    <li><a class="nav-link" href="{{ route('izin') }}">Izin</a></li>
    <li><a class="nav-link" href="{{ route('sakit') }}">Sakit</a></li>
    <li><a class="nav-link" href="{{ route('dinas') }}">Dinas</a></li>
    <li class="menu-header">Report</li>
    <li><a class="" href="{{ route('report') }}">Report</a></li>  
    </ul>
  </aside>
</div>


