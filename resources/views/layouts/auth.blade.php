<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PPDB Laravel - @yield('title', 'Autentikasi')</title>
    <link rel="icon" type="image/png" href="{{ asset('Logo CB.png') }}">
    
    <!-- CSS Vendor dari login.php -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
    
    <!-- CSS Kustom dari login.php -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
    
    <style>
        /* Override default Laravel styling for login/register background */
        .container-login100 {
            background-image: url('{{ asset('smkcb-1.jpg') }}') !important;
            background-size: cover !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
        }
        /* Style untuk pesan error/sukses agar terlihat bagus di layout ini */
        .alert {
            padding: 10px 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            font-size: 14px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- JS Vendor dari login.php -->
    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/tilt/tilt.jquery.min.js') }}"></script>
    <script>
        // Re-initialize tilt effect
        $('.js-tilt').tilt({
            scale: 1.1
        });
    </script>
    <!-- JS Kustom dari login.php -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
