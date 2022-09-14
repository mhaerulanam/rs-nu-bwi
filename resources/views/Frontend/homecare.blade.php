@extends('layout')
<link href="{{ asset('frontend/css/konsultasi.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css"
    rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<style>
    .wrapper{
        max-width: auto;
        background: rgb(200, 255, 200);
        height: 50px;
        padding-top: 10px;
        font-size: 20px;
        font-weight: bold;
        color: rgb(15, 88, 0);
        text-align: right;
    }

    .marquee {
        white-space: nowrap;
        -webkit-animation: rightThenLeft 1.5s linear;
    }
</style>
@section('content')
    <!--Page Title-->
    @if ($banners != null)
        <section class="page-title text-center"
            style="background-image:url(/upload/banner/{{ $banners->image }}); color: rgb(218, 167, 2) !important">
            <div class="container">
                <div class="title-text">
                    <h1>Homecare</h1>
                    <ul class="title-menu clearfix">
                        <li>
                            <a href="/">home &nbsp;/</a>
                        </li>
                        <li style="color: rgb(238, 255, 0) !important">Homecare</li>
                    </ul>
                </div>
            </div>
        </section>
    @else
        <section class="page-title text-center"
            style="background-image:url(/frontend/images/background/3.jpg); color: rgb(218, 167, 2) !important">
            <div class="container">
                <div class="title-text">
                    <h1>Homecare</h1>
                    <ul class="title-menu clearfix">
                        <li>
                            <a href="/">home &nbsp;/</a>
                        </li>
                        <li style="color: rgb(253, 201, 30) !important">Homecare</li>
                    </ul>
                </div>
            </div>
        </section>
    @endif
    <div class="wrapper">
        <marquee behavior="alternate"><span class="marquee">{!! $settingsInfo->content  !!}</span></marquee>
    </div>
    {{-- menampilkan error validasi --}}
    @if (count($errors) > 0)
        <center>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </center>
    @endif

    @if ($message = Session::get('success'))
        <Center>
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        </Center>
    @endif

    @if ($message = Session::get('error'))
        <center>
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        </center>
    @endif
    @if (Auth::user() && $is_homecare == true)
        <section class="blog-section style-four section" style=" background-image: url('/assets/bg/bg2.jpg');  background-size: cover; background-repeat: no-repeat;">
            <div class="container">
                <div id="kotakMasuk" class="w3-container city">
                    <div class="messaging">
                        <div class="inbox_msg">
                            <div class="inbox_people">
                                <div class="headind_srch">
                                    <div class="recent_heading">
                                        <h5>Riwayat Homecare</h5>
                                    </div>
                                    <div class="srch_bar">
                                        <a class="btn btn-secondary" href="javascript:createHomecare();"><span><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                </svg></span></a>
                                    </div>
                                </div>
                                <div class="inbox_chat">
                                    @if (!empty($homecareRiwayat))
                                        @foreach ($homecareRiwayat as $data)
                                            <a href="javascript:openDetailHomecare({{ $data->id }});">
                                                <div class="chat_list" id="homecare{{ $data->id }}">
                                                    <div class="chat_people">
                                                        <div class="chat_img"> <img
                                                                src="https://ptetutorials.com/images/user-profile.png"
                                                                alt="sunil"> </div>
                                                        <div class="chat_ib">
                                                            <h5>{{ Auth::user()->name }}<span
                                                                    class="chat_date">{{ $data->created_at->format('d M Y') }}</span>
                                                            </h5>
                                                            <p>{!! Str::limit($data->kondisi_pasien, 50, $end = ' ...') !!}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="mesgs" style="display: none" id="detailHomecare">
                                <div class="container-title">
                                    <span class="judul"></span>
                                </div>
                                <div class="msg_history">
                                    <span style="margin: 6px"><br /></span>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <span class="label-contents">No. Rekam Medik :</span>
                                            <h6 id="noMedik"></h6>
                                        </div>
                                        <div class="col-md-4">
                                            <span class="label-contents">Diagnosa :</span>
                                            <h6 id="diagnosa"></h6>
                                        </div>
                                        <div class="col-md-4">
                                            <span class="label-contents">Pelayanan :</span>
                                            <h6 id="layanan"></h6>
                                        </div>
                                    </div>
                                    <span style="margin: 6px"><br /></span>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="label-contents">Kondisi Pasien :</span>
                                            <div class="content" style="border: solid 2px rgb(202, 202, 202)">
                                                <p id="kondisiPasien"
                                                    style="padding: 16px; font-size: 14px; text-align: justify;"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 16px">
                                        <div class="col-md-12">
                                            <div class="content" style="">
                                                <p id="kondisiPasien"
                                                    style="padding: 16px; font-size: 14px; text-align: justify;"></p>
                                            </div>
                                            <span class="label-contents">Pelayanan lebih lanjut hubungi : <a href="https://wa.me/6281515485691" style="color: red">081254214412 (Admin)</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Input Homecare --}}
                            <div class="mesgs" style="display: none" id="inputHomecare">
                                <h4 style="margin-bottom: 16px">Form Homecare</h4>
                                <div class="msg_history" style="border: solid 2px rgb(231, 231, 231); padding: 24px;">
                                    <form name="add-blog-post-form" id="add-blog-post-form" method="post"
                                        action="{{ url('add-homecare') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col mb-0">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Tindakan :
                                                        <span style="font-size: 12px; color:red;">*</span></label>
                                                    <input type="hidden" name="id" value="{{ $layanan->no_rm }}">
                                                    <select class="form-control" style="padding: 4px; !important"
                                                        id="exampleFormControlSelect1" name="layanan" required>
                                                        <option selected disabled>Pilih Tindakan</option>
                                                        @foreach ($masterLayanan as $data_layanan)
                                                            <option value="{{ $data_layanan->id }}"
                                                                {{ $layanan->id_layanan == $data_layanan->id ? 'selected' : '' }}>
                                                                {{ $data_layanan->layanan }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="deskripsi" class="form-label">Kondisi Tubuh: <span
                                                        style="font-size: 12px; color:red;">*</span></label>
                                                <br><span style="color: rgb(180, 180, 180)"; font-size: 12px;>Bagaimana
                                                    kondisi anda sekarang?</span>
                                                <textarea id="konten" class="form-control" name="kondisiTubuh" rows="5" cols="40">
                                                </textarea>
                                            </div>
                                        </div>
                                        <span style="margin: 6px"><br /></span>
                                        <div class="row text-right">
                                            <button type="submit" class="btn-style-one">Kirim</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                        crossorigin="anonymous"></script>
                    <script src="{{ asset('frontend/js/custom.js') }}"></script>
                </div>
            </div>
        </section>
    @else
        <section class="blog-section style-four section" style=" background-image: url('/assets/bg/bg2.jpg');  background-size: cover; background-repeat: no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="left-side">
                            <img class="img-responsive" src="/upload/homecare/{{ $settingsInfoImage->content }}" alt="service-image">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="right-side">
                            <div style="background: rgb(255, 255, 255); padding: 16px;" class="">
                                <div id="login-form-wrap">
                                    <h2>Login</h2>
                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />
                                    <div class="mb-3">
                                        <!-- Validation Errors -->
                                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                    </div>
                                    <form id="login-form" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <p>
                                            <input type="email" id="email" name="email"
                                                placeholder="Email Address" required><i
                                                class="validation"><span></span><span></span></i>
                                        </p>
                                        <p>
                                            <input type="password" id="password" name="password" placeholder="Password"
                                                required autocomplete="current-password" aria-describedby="password">
                                            <i class="validation"><span></span><span></span></i>
                                        </p>
                                        <p>
                                            <button class="btn btn-primary d-grid w-100" id="btn-login"
                                                type="submit">Login</button>
                                        </p>
                                    </form>
                                    <!--create-account-wrap-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- CkEditor --}}
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        var konten = document.getElementById("konten");
        CKEDITOR.replace(konten, {
            language: 'en-gb'
        });
        CKEDITOR.config.allowedContent = true;
    </script>
@stop
