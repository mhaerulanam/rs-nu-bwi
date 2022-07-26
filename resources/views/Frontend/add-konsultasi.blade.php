@extends('layout')
<link href="{{ asset('frontend/css/konsultasi.css') }}" rel="stylesheet">
@section('content')
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
                        <li style="color: rgb(253, 201, 30) !important">Tulis Konsultasi</li>
                    </ul>
                </div>
            </div>
        </section>
    @else
        <section class="page-title text-center"
            style="background-image:url(/frontend/images/background/3.jpg); color: rgb(218, 167, 2) !important">
            <div class="container">
                <div class="title-text">
                    <h1>Blog Details</h1>
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
    <section class="appoinment-section section">
        <div class="container">
            <div class="contact-area">
                <div class="section-title">
                    <h3>Segera
                        <span>Konsultasi</span>
                    </h3>
                </div>
                <form name="contact_form" class="default-form contact-form" action="{{ url('/user/konsultasi')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <label for="konsultasi" class="form-label">Informasi Data : </label>
                            <div class="form-group">
                                <input type="text" name="title" placeholder="Judul Konsultasi" required="">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Nama Lengkap" required="">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email Aktif" required="">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <input type="number" name="noHp" placeholder="No Telp" required="">
                            </div>
                            <div class="form-group">
                                <input type="text" name="pekerjaan" placeholder="Pekerjaan" required="">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="konsultasi" class="form-label">Keluhan :</label>
                                <textarea name="konsultasi" placeholder="Bagaimana kondisi anda sekarang?" required=""></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <span class="pull-right">
                                <button type="submit" class="btn-style-one">kirim</button>
                            </span>
                            <span class="pull-right" style="margin-right:12px">
                                <a href="/user/konsultasi" class="btn-outline">Kembali</a>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@stop
