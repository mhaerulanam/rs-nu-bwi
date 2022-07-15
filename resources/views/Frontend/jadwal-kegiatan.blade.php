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
    <section class="service-section bg-gray section">
        <div class="section-title text-center" style="margin-bottom: 40px">
            <h3>Jadwal
                <span>Kegiatan</span>
            </h3>
        </div>
        <div class="container" style="margin-bottom: 120px">
            @foreach ($jadwalKegiatan as $data)
                <center>
                    <img src="/upload/jadwal/{{ $data->image }}" style="object-fit: cover" width="1000px" alt="Appointment">
                </center>
            @endforeach
        </div>
    </section>
    <!-- End Contact Section -->
@stop
