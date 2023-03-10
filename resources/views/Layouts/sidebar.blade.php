
<!DOCTYPE html>
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
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
</head>
<body class="sidebar-mini layout-fixed layout-navbar-fixed accent-navy sidebar-open">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand border-bottom-0 navbar-light bg-warning">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link d-flex" data-toggle="dropdown" href="#">
          <span class="mr-2">{{ auth()->user()->username }}</span>
          <i class="far fa-user-circle" style="font-size: 24px"></i>
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
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-warning elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link bg-warning  ">
      <span class="brand-text font-weight-light">Perpustaka<b>Anya</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 mb-3 d-flex">
        <div class="info">
          <p class="d-block text-gray">{{ auth()->user()->username }} ({{ auth()->user()->user_number }})</p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
          <li class="nav-item @yield('nav-book-open')">
            <a href="" class="nav-link @yield('book-active')">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Kelola buku
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('book.index') }}" class="nav-link @yield('book-table-active')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tabel Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('book.create') }}" class="nav-link @yield('add-book-active')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah buku</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item @yield('nav-borrow-open')">
            <a href="" class="nav-link @yield('borrow-active')">
              <i class="nav-icon fas fa-exchange-alt"></i>
              <p>
                Kelola transaksi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('borrow.index') }}" class="nav-link @yield('borrow-table-active')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Peminjaman buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('return.index') }}" class="nav-link @yield('return-table-active')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengembalian buku</p>
                </a>
              </li>
            </ul>
          </li>
          <div class="fixed-bottom ml-2 mb-2">
            <ul class="nav nav-sidebar nav-pills">
              <li class="nav-item">
                <form action="{{ route('logout') }}" id="logout-form" method="post">
                  @csrf
                  <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                  </a>
                </form>
              </li>
            </ul>
          </div>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('header')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              @yield('breadcrumb')
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            @if (session('deleted'))
              <div class="card card-danger card-outline">
                <div class="card-header">
                  <h4 class="card-title">{{ session('deleted') }}</h4>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
              </div>
            @endif
            @if (session('success'))
              <div class="card card-success card-outline">
                <div class="card-header">
                  <h4 class="card-title">{{ session('success') }}</h4>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
              </div>
            @endif
            @yield('content')
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Optional script -->
@yield('js')
<!-- overlayScrollbars -->
<script src="{{ asset('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script>
</body>
</html>