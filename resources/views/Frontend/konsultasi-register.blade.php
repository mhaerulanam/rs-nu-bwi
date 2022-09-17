@extends('layout')
<link href="{{ asset('frontend/css/konsultasi.css') }}" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
    {{-- menampilkan error validasi --}}
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($message = Session::get('success'))
        <center>
            <div class="alert alert-success alert-dismissible" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </center>
    @endif

    @if ($message = Session::get('error'))
        <center>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </center>
    @endif
    <!--Page Title-->
    @if ($banners != null)
        <section class="page-title text-center"
            style="background-image:url(/upload/banner/{{ $banners->image }}); color: rgb(218, 167, 2) !important">
            <div class="container">
                <div class="title-text">
                    <h1>Konsultasi</h1>
                    <ul class="title-menu clearfix">
                        <li>
                            <a href="/">home &nbsp;/</a>
                        </li>
                        <li style="color: rgb(238, 255, 0) !important">Konsultasi</li>
                    </ul>
                </div>
            </div>
        </section>
    @else
        <section class="page-title text-center"
            style="background-image:url(/frontend/images/background/3.jpg); color: rgb(218, 167, 2) !important">
            <div class="container">
                <div class="title-text">
                    <h1>Konsultasi</h1>
                    <ul class="title-menu clearfix">
                        <li>
                            <a href="/">home &nbsp;/</a>
                        </li>
                        <li style="color: rgb(238, 255, 0) !important">Konsultasi</li>
                    </ul>
                </div>
            </div>
        </section>
    @endif
    @if (!empty($error))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <center><strong>Silahkan <a href="" style="color: red; font-weight:bold;">Login</a> terlebih
                    dahulu, untuk mendapatkan pelayanan! </strong></center>
        </div>
    @endif
    <!--End Page Title-->
    <section class="blog-section style-four section" style=" background-image: url('/assets/bg/bg2.jpg');  background-size: cover; background-repeat: no-repeat;">
        <div class="container-fluid">
            <center>
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12" style="float: none">
                        <div style="background: rgb(255, 255, 255); padding: 16px;" class="">
                            <div id="login-form-wrap">
                                <h2>Form Register</h2>
                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />
                                <div class="mb-3">
                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                </div>
                                <form id="login-form" method="POST" action="{{ route('register-store') }}">
                                    @csrf
                                    <p>
                                        <input type="text" id="name" name="name"
                                            placeholder="Nama Lengkap" required><i
                                            class="validation"><span></span><span></span></i>
                                    </p>
                                    <p>
                                        <input type="email" id="email" name="email"
                                            placeholder="Email" required><i
                                            class="validation"><span></span><span></span></i>
                                    </p>
                                    <p>
                                        <input type="password" id="password" name="password" placeholder="Password"
                                            required autocomplete="current-password" aria-describedby="password">
                                        <i class="validation"><span></span><span></span></i>
                                    </p>
                                    <p>
                                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password"
                                            required aria-describedby="password_confirmation">
                                        <i class="validation"><span></span><span></span></i>
                                    </p>
                                    <div class="container-text" style="float: left">
                                        <h6 style="font-weight:normal ">Sudah memiliki akun? <a href="/user/konsultasi" style="color: grey; font-weight: bold; ">
                                            <span style="font-weight: bold">
                                                Login
                                            </span>
                                        </a></h6>
                                    </div>
                                    <br style="margin: 16px">
                                    <p>
                                        <button class="btn btn-primary d-grid w-100" id="btn-login"
                                            type="submit">Daftar</button>
                                    </p>
                                </form>
                                <!--create-account-wrap-->
                            </div>
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </section>
    <script>
        function openCity(cityName) {
            var i;
            var x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(cityName).style.display = "block";

            console.log(cityName);
            const km = document.getElementById("kotak_masuk");
            const kt = document.getElementById("kotak_terkirim");

            if (cityName == 'kotakTerkirim') {
                console.log(kt);
                document.getElementById("detailMessage").style.display =
                    "none";
                kt.className = 'btn-style-one';
                km.className = "btn-outline";
            } else {
                console.log(km);
                document.getElementById("detailMessageTerkirim").style.display =
                    "none";
                kt.className = 'btn-outline';
                km.className = "btn-style-one";
            }
        }

        function add() {
            document.getElementById(coba).style.display = "hidden";

            console.log(cityName);
            const km = document.getElementById("kotak_masuk");
            const kt = document.getElementById("kotak_terkirim");

            if (cityName == 'kotakTerkirim') {
                console.log(kt);
                kt.className = 'btn-style-one';
                km.className = "btn-outline";
            } else {
                console.log(km);
                kt.className = 'btn-outline';
                km.className = "btn-style-one";
            }
        }
    </script>
@stop
