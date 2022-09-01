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
    @if (!$bpjs->isEmpty())
        @foreach ($bpjs as $data)
            <!-- Contact Section -->
            <section class="blog-section section style-three pb-0" style=" background-image: url('/assets/bg/bg6-new.jpg');  background-size: cover; background-repeat: no-repeat;">
                <div class="section-title text-center" style="margin-bottom: 40px">
                    <h3>BPJS
                        <span>Kesehatan</span>
                    </h3>
                </div>
                <div class="container">
                    <center>
                        <img src="/upload/bpjs/{{ $data->image }}" style="object-fit: cover; margin-bottom: 120px" width="1000px"                           alt="Appointment">
                    </center>
                </div>
            </section>
            <!-- End Contact Section -->
            <section class="service-section bg-gray section">
                <div class="container">
                    <div class="section-title text-center" style="margin-bottom: 40px">
                        <h3>{{ $data->title }}
                            {{-- <span>Kesehatan</span> --}}
                        </h3>
                    </div>
                    <div class="col-md-12">
                        <div class="contact-area style-two">
                            {{-- <div class="section-title">
                        <h3>sasas{{ $data->name }}</h3>
                    </div> --}}
                            <div name="contact_form" class="default-form contact-form" action="sendmail.php" method="post">
                                <div class="row" style="padding: 16px;">
                                    <p style="text-align: justify">
                                        {!! $data->description !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
    @endif
@stop
