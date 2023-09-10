<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Laravel SB Admin 2">
    <meta name="author" content="Alejandro RH">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | {{ getenv('SCHOOL_NAME') }}</title>

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- smekda -->
    <link href="{{ asset('img/smekda.png') }}" rel="icon" type="image/png">

    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}"/>

    @stack('css')
</head>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-book"></i>
            </div>
            <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ Nav::isRoute('home') }}">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ __('Dashboard') }}</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        @if (auth()->user()->role_id == 1)

        <!-- Heading -->
        <div class="sidebar-heading">
            {{ __('Settings') }}
        </div>

        <li class="nav-item {{ Nav::isRoute('pengguna.index') }}">
            <a class="nav-link" href="{{ route('pengguna.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>{{ __('Data Pengguna') }}</span>
            </a>
        </li>

        <li class="nav-item {{ Nav::isRoute('kelas.index') }}">
            <a class="nav-link" href="{{ route('kelas.index') }}">
                <i class="fas fa-fw fa-building"></i>
                <span>{{ __('Data Kelas') }}</span>
            </a>
        </li>

        <li class="nav-item {{ Nav::isRoute('mutasi.index') }}">
            <a class="nav-link" href="{{ route('mutasi.index') }}">
                <i class="fas fa-fw fa-building"></i>
                <span>{{ __('Data mutasi') }}</span>
            </a>
        </li>

        <li class="nav-item {{ Nav::isRoute('admin-kas.index') }}">
            <a class="nav-link" href="{{ route('admin-kas.index') }}">
                <i class="fas fa-fw fa-receipt"></i>
                <span>{{ __('Data Kas') }}</span>
            </a>
        </li>

        <!-- <li class="nav-item {{ Nav::isRoute('mutasi.index') }}">
            <a class="nav-link" href="{{ route('mutasi.index') }}">
                <i class="fas fa-fw fa-receipt"></i>
                <span>{{ __('Data Mutasi') }}</span>
            </a>
        </li> -->

        <li class="nav-item {{ Nav::isRoute('laporan.index') }}">
            <a class="nav-link" href="{{ route('laporan.index') }}">
                <i class="fas fa-fw fa-receipt"></i>
                <span>{{ __('Laporan') }}</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        @endif

        @if (auth()->user()->role_id == 2)

        <!-- Heading -->
        <div class="sidebar-heading">
            {{ __('MENU DATA') }}
        </div>

        <li class="nav-item {{ Nav::isRoute('bendahara-kas.index') }}">
            <a class="nav-link" href="{{ route('bendahara-kas.index') }}">
                <i class="fas fa-fw fa-receipt"></i>
                <span>{{ __('Data Kas') }}</span>
            </a>
        </li>

        <!-- <li class="nav-item {{ Nav::isRoute('bendahara-mutasi.index') }}">
            <a class="nav-link" href="{{ route('bendahara-mutasi.index') }}">
                <i class="fas fa-fw fa-receipt"></i>
                <span>{{ __('Data Mutasi') }}</span>
            </a>
        </li> -->

        <li class="nav-item {{ Nav::isRoute('bendahara-laporan.index') }}">
            <a class="nav-link" href="{{ route('bendahara-laporan.index') }}">
                <i class="fas fa-fw fa-receipt"></i>
                <span>{{ __('Laporan') }}</span>
            </a>
        </li>

        <hr class="sidebar-divider">

       @endif
        @if (auth()->user()->role_id == 3)

        <li class="nav-item {{ Nav::isRoute('siswa-kas.index') }}">
            <a class="nav-link" href="{{ route('siswa-kas.index') }}">
                <i class="fas fa-fw fa-receipt"></i>
                <span>{{ __('Data Kas') }}</span>
            </a>
        </li>

        <!-- <li class="nav-item {{ Nav::isRoute('siswa-mutasi.index') }}">
            <a class="nav-link" href="{{ route('siswa-mutasi.index') }}">
                <i class="fas fa-fw fa-receipt"></i>
                <span>{{ __('Data Mutasi') }}</span>
            </a>
        </li> -->

        <li class="nav-item {{ Nav::isRoute('siswa-laporan.index') }}">
            <a class="nav-link" href="{{ route('siswa-laporan.index') }}">
                <i class="fas fa-fw fa-receipt"></i>
                <span>{{ __('Laporan') }}</span>
            </a>
        </li>

        @endif


        <!-- Nav Item - Profile -->
          <li class="nav-item {{ Nav::isRoute('profile') }}">
            <a class="nav-link" href="{{ route('profile') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>{{ __('Profile') }}</span>
            </a>
        </li>

        <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                            <figure class="img-profile rounded-circle avatar font-weight-bold" data-initial="{{ Auth::user()->name[0] }}"></figure>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Profile') }}
                            </a>
                            {{-- <a class="dropdown-item" href="javascript:void(0)">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Settings') }}
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Activity Log') }}
                            </a> --}}
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                @stack('notif')
                @yield('main-content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; {{ getenv('SCHOOL_NAME') . ' ' . date('Y') }}</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Apakah Anda Yakin Ingin Keluar ?') }}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Tekan Tombol Logout Jika Anda Yakin Ingin keluar.</div>
            <div class="modal-footer">
                <button class="btn btn-link" type="button" data-dismiss="modal">{{ __('Kembali') }}</button>
                <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script>
@stack('js')
</body>
</html>
