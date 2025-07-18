<!DOCTYPE html>
<html class="no-js" lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PPDB Laravel - @yield('title', 'Beranda')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('Logo CB.png') }}">
    
    <!-- CSS Vendor dan Kustom dari template srtdash -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    
    <!-- Modernizr CSS (dari template srtdash) -->
    <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <!-- Global site tag (gtag.js) - Google Analytics (dari template lama Anda) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-144808195-1');
    </script>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <a href="{{ route('user.dashboard') }}"><img src="{{ asset('Logo CB.png') }}" alt="logo" width="100%"></a>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}"><a href="{{ route('user.dashboard') }}"><span>Dashboard</span></a></li>
                            <li class="{{ request()->routeIs('user.daftar.form') || request()->routeIs('user.mydata') ? 'active' : '' }}">
                                <a href="{{ route('user.mydata') }}"><i class="ti-layout"></i><span>Pendaftaran</span></a>
                            </li>
                            {{-- Tambahkan link admin jika user adalah admin --}}
                            @if(Auth::guard('admin')->check())
                                <li class="{{ request()->routeIs('admin.dashboard') || request()->routeIs('admin.pendaftar.*') || request()->routeIs('admin.wilayah.*') || request()->routeIs('admin.jurusan.*') ? 'active' : '' }}">
                                    <a href="{{ route('admin.dashboard') }}"><i class="ti-layout"></i><span>Admin Panel</span></a>
                                    <ul>
                                        <li><a href="{{ route('admin.pendaftar.list') }}">Manajemen Pendaftar</a></li>
                                        <li><a href="{{ route('admin.wilayah.index') }}">Manajemen Wilayah</a></li>
                                        <li><a href="{{ route('admin.jurusan.index') }}">Manajemen Jurusan</a></li>
                                    </ul>
                                </li>
                            @endif
                            <li>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();"><span>Logout</span></a>
                                <form id="logout-form-sidebar" action="{{ Auth::guard('admin')->check() ? route('admin.logout') : route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->

        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li><h3><div class="date">
                                <script type='text/javascript'>
                                var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                var date = new Date();
                                var day = date.getDate();
                                var month = date.getMonth();
                                var thisDay = date.getDay(),
                                    thisDay = myDays[thisDay];
                                var yy = date.getYear();
                                var year = (yy < 1000) ? yy + 1900 : yy;
                                document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                                </script></b></div></h3>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            
            <div class="main-content-inner">
                {{-- Flash Messages --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Sukses!</strong> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
        <!-- main content area end -->

        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>PPDB Online by Kelompok 1</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->

    <!-- jQuery and other JS files -->
    <script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- Chart JS libraries (jika diperlukan oleh halaman yang meng-extend layout ini) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>

    <!-- Custom scripts dari aset Anda -->
    <script src="{{ asset('assets/js/line-chart.js') }}"></script>
    <script src="{{ asset('assets/js/pie-chart.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    {{-- app.js dan maps.js hanya untuk halaman tertentu, akan dipanggil di view spesifik jika perlu --}}
    {{-- <script src="{{ asset('assets/js/app.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/maps.js') }}"></script> --}}

    {{-- Script untuk Select2 khusus jika ada di vendor --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/select2-4.0.6-rc.1/dist/css/select2.min.css') }}"> --}}
    {{-- <script src="{{ asset('assets/select2-4.0.6-rc.1/dist/js/select2.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/select2-4.0.6-rc.1/dist/js/i18n/id.js') }}"></script> --}}

</body>
</html>
