<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'E-Konsul' }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">

    @stack('css')
    <link rel="stylesheet" href="/notif/dist/css/iziToast.min.css">
    <script src="/notif/dist/js/iziToast.min.js" type="text/javascript"></script>
    <style>
        .active2 {
            background-color: rgb(190, 222, 251);

        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light"
            style="box-shadow: 0px 1px 10px silver;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/superadmin" class="nav-link  {{request()->is('superadmin') ? 'active2':''}}">Dashboard</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/superadmin/klien"
                        class="nav-link  {{request()->is('superadmin/klien*') ? 'active2':''}}">Klien</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/superadmin/dokumen"
                        class="nav-link  {{request()->is('superadmin/dokumen*') ? 'active2':''}}">Dokumen</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/superadmin/verifikasi"
                        class="nav-link  {{request()->is('superadmin/verifikasi*') ? 'active2':''}}">Verifikasi</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/superadmin/evaluasi"
                        class="nav-link  {{request()->is('superadmin/evaluasi*') ? 'active2':''}}">Evaluasi</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->


        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link text-center">
                <img src="/logo/logo-tanbu.png" alt="AdminLTE Logo" style="opacity: .8" width="15%"><br />
                <span class="brand-text font-weight-light">

                    {{Auth::user()->name}}

                </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        @guest

                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                <i class="nav-icon fa fa-user-lock"></i>
                                <p>
                                    SIGN IN
                                </p>
                            </a>
                        </li>
                        @endguest

                        @if (Auth::user()->roles == 'superadmin')

                        <li class="nav-item">
                            <a href="/laporan/klien" class="nav-link {{request()->is('laporan/klien') ? 'active2':''}}">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    LAPORAN KLIEN
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/laporan/dokumen"
                                class="nav-link {{request()->is('laporan/dokumen') ? 'active2':''}}">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    LAPORAN DOKUMEN
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/laporan/verifikasi"
                                class="nav-link {{request()->is('laporan/verifikasi') ? 'active2':''}}">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    LAPORAN VERIFIKASI
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/laporan/evaluasi"
                                class="nav-link {{request()->is('laporan/evaluasi') ? 'active2':''}}">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    LAPORAN EVALUASI
                                </p>
                            </a>
                        </li>

                        @else

                        <li class="nav-item">
                            <a href="/user/dashboard"
                                class="nav-link {{request()->is('user/dashboard') ? 'active':''}}">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    DASHBOARD
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/user/ajukan" class="nav-link {{request()->is('user/ajukan*') ? 'active':''}}">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Ajukan Penerima BanSos
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/user/pengaduan"
                                class="nav-link {{request()->is('user/pengaduan*') ? 'active':''}}">
                                <i class="nav-icon fas fa-comment"></i>
                                <p>
                                    Pengaduan
                                </p>
                            </a>
                        </li>
                        @endif

                        <li class="nav-item">
                            <a href="/logout" class="nav-link" onclick="return confirm('Yakin ingin keluar?');">
                                <i class="nav-icon fas fa-arrow-right"></i>
                                <p>
                                    SIGN OUT
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <br />

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">

        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/assets/dist/js/adminlte.min.js"></script>

    @stack('js')
    <script>
        function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
    </script>
    <script type="text/javascript">
        @include('layouts.notif')
    </script>
</body>

</html>