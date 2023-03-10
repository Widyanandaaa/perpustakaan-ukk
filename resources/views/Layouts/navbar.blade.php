
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href=" {{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Optional style -->
    @yield('css')
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition layout-top-nav dark-mode accent-light layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light bg-teal border-bottom-0">
    <div class="container">
      <a href="/home" class="navbar-brand">
        <span class="brand-text font-weight-light text-gray-dark">Perpustaka<b>Anya</b></span>
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="/home" class="nav-link">Beranda</a>
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block" style="display: none;">
            <form action="{{ route('book.search') }}" method="GET" id="formSearch" class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" id="search" name="query" type="search" placeholder="Cari disini..." aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <!-- Account Dropdown Menu -->
        @guest
          <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link" style="text-decoration: underline; font-weight: bold;">Login</a>
          </li>
        @else
          @if (auth()->user()->role == 'Pustakawan')
              <li class="nav-item">
                <a class="nav-link d-flex" data-toggle="dropdown" href="#">
                  <span class="mr-2">{{ auth()->user()->username }}</span>
                  <i class="fas fa-user-circle" style="font-size: 24px"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                  <li><a href="{{ route('librarian.index') }}" class="dropdown-item">Kelola Perpustakaan</a></li>
                  <li class="dropdown-divider"></li>
                  <form action="{{ route('logout') }}" id="logout-form" method="post">
                    @csrf
                    <li><a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      Logout
                    </a></li>
                  </form>
                </ul>
              </li>
          @else
            <li class="nav-item">
              <a class="nav-link d-flex" data-toggle="dropdown" href="#">
                <span class="mr-2">{{ auth()->user()->username }}</span>
                <i class="fas fa-user-circle" style="font-size: 24px"></i>
              </a>  
              <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <li><a href="{{ route('member.borrow.index', auth()->user()->username) }}" class="dropdown-item">Kelola Pinjaman</a></li>
                <li class="dropdown-divider"></li>
                <form action="{{ route('logout') }}" id="logout-form" method="post">
                  @csrf
                  <li><a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                  </a></li>
                </form>
              </ul>
            </li>
          @endif
        @endguest
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('header')
    <!-- /.content-header -->

    <!-- Main content -->
    @if (session('warning'))
      <div class="card card-warning">
        <div class="card-header">
          <h4 class="card-title">{{ session('warning') }}</h4>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
      </div>
    @endif
    @yield('main-content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @yield('footer')
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Widyanandas are the best.
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Optional script -->
    @yield('js')
    <!-- AdminLTE App -->
    <script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
