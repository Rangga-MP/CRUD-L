<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Penerimaan Peserta Didik Baru (PPDB) Online - @yield('title', 'Beranda')</title>
    
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/png" href="{{ asset('Logo CB.png') }}">
    
    <!-- Core theme CSS (includes Bootstrap) - MEMUAT STYLES.CSS DARI PUBLIC/CSS -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    
    <!-- jQuery for some scripts that rely on it before Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics (dari template lama Anda) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-144808195-1');
    </script>
</head>
<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">PPDB Online</a>
            <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Jurusan</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#panduan">Panduan</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#kontak">Kontak</a></li>
                    
                    @auth
                        {{-- Jika user sudah login --}}
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('user.dashboard') }}">Dashboard</a></li>
                        <li class="nav-item mx-0 mx-lg-1">
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="nav-link py-3 px-0 px-lg-3 rounded bg-danger text-white">Logout</button>
                            </form>
                        </li>
                    @else
                        {{-- Jika user belum login --}}
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded bg-primary text-white" href="{{ route('register') }}">Daftar</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer-->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Telepon</h4>
                    <h6>Panitia PPDB SMK Canda Bhirawa Pare 2024/2025</h6>
                    <p class="lead mb-0">
                        <i class="fab fa-fw fa-whatsapp" style="color: #25D366;"></i>
                        Whatsapp :
                        <br>088231243411
                        <br>081259702828
                        <br>085735087090
                        <br>085735083593
                        <br>085156545704
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Media Sosial</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/people/Smk-Canda-Bhirawa-Pare/pfbid0226AAUvsifdoagCC6t3GbNnyQxTCq4wHUhFEvf8cqBZs1zYW7UpmYWEnVYH69KdK5l/" target="_blank"><i class="fab fa-fw fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="https://ppdb.smkcbpare.sch.id/beranda" target="_blank"><i class="fas fa-globe"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="https://www.youtube.com/@smkcandabhirawaparekediri730/videos" target="_blank"><i class="fab fa-fw fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="https://www.instagram.com/smkcandabhirawa?igsh=YzljYTk1ODg3Zg==" target="_blank"><i class="fab fa-fw fa-instagram"></i></a>
                </div>
                <!-- Footer About Text-->
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4" style="position:relative; left:30px">Alamat Sekolah</h4>
                    <p class="lead mb-0">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7906.510538561742!2d112.18500703903622!3d-7.762730388468922!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e785dcb4e476789%3A0x71324f6d8451500c!2sSMK%20Canda%20Bhirawa%20Pare!5e0!3m2!1sid!2sid!4v1731997223848!5m2!1sid!2sid" width="400" height="400" style="border:0; border-radius:30px; " allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright &copy; PPDB Online SMK Canda Bhirawa {{ date('Y') }}</small></div>
    </div>
    <!-- Scroll to Top Button (Hidden by default)-->
    <div class="scroll-to-top d-lg-none position-fixed">
        <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
    </div>
    
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Contact form JS-->
    <script src="{{ asset('assets/mail/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('assets/mail/contact_me.js') }}"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
