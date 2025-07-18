@extends('layouts.auth')

@section('title', 'Daftar Akun Baru')

@section('content')
    <div class="login100-pic js-tilt" data-tilt>
        <img src="{{ asset('Logo CB.png') }}" alt="IMG">
    </div>

    <form class="login100-form validate-form" action="{{ route('register') }}" method="POST">
        @csrf

        <span class="login100-form-title">
            Daftar Akun Baru
        </span>

        {{-- Menampilkan pesan error validasi dari Laravel --}}
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="wrap-input100 validate-input" data-validate="Username is required">
            <input class="input100" type="text" name="username" placeholder="Username" value="{{ old('username') }}" required autofocus>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="fa fa-user" aria-hidden="true"></i>
            </span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input class="input100" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100" type="password" name="password" placeholder="Password" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Confirm Password is required">
            <input class="input100" type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
        </div>

        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
                Daftar
            </button>
        </div>

        <div class="text-center p-t-136">
            <a class="txt3" href="{{ route('home') }}">
                <i class="fa fa-long-arrow-left m-l-5" style="margin-left: 170px;" aria-hidden="true"></i>
                Back to Home
            </a>
            <a class="txt2" href="{{ route('login') }}">
                Sudah punya akun? Login
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
        </div>
    </form>
@endsection
