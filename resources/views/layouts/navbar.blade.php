<div class="navbar-bg"></div>
  <nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      </ul>
    </form>
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="{{ asset ('stisla/assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
        <!-- <img src="{{ Auth::user()->avatar }}" class="rounded-circle mr-1" width="50" height="30"> -->
        <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->nama }}</div></a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </div>
      </li>
  </nav>