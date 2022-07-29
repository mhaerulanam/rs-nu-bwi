<style>
    #form-password {
        -webkit-box-shadow: -11px 32px 77px 5px rgba(224, 224, 224, 1);
        -moz-box-shadow: -11px 32px 77px 5px rgba(224, 224, 224, 1);
        box-shadow: -11px 32px 77px 5px rgba(224, 224, 224, 1);
        padding: 24px;
    }

    .invalid-feedback {
        color: red;
        font-weight: 200;
        font-size: 12px;
    }
</style>
@extends('layout')
<link href="{{ asset('frontend/css/konsultasi.css') }}" rel="stylesheet">
@section('content')
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
    <section class="blog-section style-four section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="left-side">
                        <img class="img-responsive" src="/rs-nu/primary.jpg" alt="service-image">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="right-side">
                        <div style="background: rgb(255, 255, 255); padding: 16px;" class="">
                            <div id="form-password" style="padding: 40px">
                                <center>
                                    <h4 style="margin-bottom:40px; color: #188043;">Ubah Password </h4>
                                </center>
                                <form method="POST" action="{{ route('change.password') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">
                                            Password Lama</label>
                                        <div class="col-md-6">
                                            <input type="password"
                                                class="form-control @error('current_password') is-invalid @enderror"
                                                name="current_password" autocomplete="current_password">
                                            @error('current_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Password
                                            Baru</label>
                                        <div class="col-md-6">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                autocomplete="password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Konfirmasi
                                            Password Baru
                                        </label>
                                        <div class="col-md-6">
                                            <input type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                name="password_confirmation" autocomplete="password_confirmation">
                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0 text-center">
                                        <div class="col-md-12 ">
                                            <button type="submit" class="btn-style-one">
                                                Change Password
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!--create-account-wrap-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
