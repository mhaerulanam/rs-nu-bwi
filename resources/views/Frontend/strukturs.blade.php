@extends('layout')
@section('content')
    <div class="hero-slider">
        @if (!$banners->isEmpty())
            @foreach ($banners as $no => $data)
                <div class="slider-item slide{{ $no }}"
                    style="background-image:url(/upload/banner/{{ $data->image }})">
                </div>
            @endforeach
        @endif
        <div class="slider-item" style="background-image:url(upload/banner/default-banner.png)">
        </div>
    </div>
    {{-- END Banner --}}
    <!-- Contact Section -->
    <section class="blog-section section style-three pb-0" style=" background-image: url('/assets/bg/bg6.jpg');  background-size: cover; background-repeat: no-repeat;">
        <div class="section-title text-center">
            <h3>Struktur
                <span>Organisasi</span>
            </h3>
        </div>
        <div class="container" style="margin-top: 30px">
            @foreach ($strukturs as $data)
                <center>
                    <img src="/upload/struktur/{{ $data->image }}" style="object-fit: cover; margin-bottom:140px" width="1000px" alt="Appointment">
                </center>
            @endforeach
        </div>
    </section>
    <!-- End Contact Section -->
@stop
