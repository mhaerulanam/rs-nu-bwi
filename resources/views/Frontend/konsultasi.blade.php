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
                        <li style="color: rgb(253, 201, 30) !important">Konsultasi</li>
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
                        <li style="color: rgb(253, 201, 30) !important">Konsultasi</li>
                    </ul>
                </div>
            </div>
        </section>
    @endif
    @if (!empty($error))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <center><strong>Silahkan <a href="/user/homecare" style="color: red; font-weight:bold;">Login</a> terlebih
                    dahulu, untuk melihat riwayat konsultasi Anda! </strong></center>
        </div>
    @endif
    <!--End Page Title-->
    <section class="blog-section style-four section">
        <div class="container">
            <div class="w3-bar w3-black">
                <div class="tab-masuk" style="display: flex">
                    <button class="btn-style-one" id="kotak_masuk" onclick="openCity('kotakMasuk')">Kotak Masuk</button>
                    <button class="btn-outline" id="kotak_terkirim" onclick="openCity('kotakTerkirim')">Kotak
                        Terkirim</button>
                </div>
            </div>
            <div id="kotakMasuk" class="w3-container city">
                @include('Frontend.konsultasi-kotak-masuk')
            </div>
            <div id="kotakTerkirim" class="w3-container city" style="display:none">
                @include('Frontend.konsultasi-kotak-terkirim')
            </div>
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
