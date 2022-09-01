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
    <section class="blog-section section style-three pb-0" style=" background-image: url('/assets/bg/bg5.jpg');  background-size: cover; background-repeat: no-repeat; margin-bottom: 24px;">
        <div class="section-title text-center" style="margin-bottom: 40px">
            <h3>Visi Misi
                <span>Rumah Sakit NU Banyuwangi</span>
            </h3>
        </div>
        <div class="container">
            @foreach ($visimisi as $data)
                <div class="row">
                    <div class="col">
                        <div class="contact-area style-two">
                            <div class="section-title">
                                <h3>{!! $data->name !!}</h3>
                            </div>
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
            @endforeach
        </div>
    </section>
    <!-- End Contact Section -->
@stop
