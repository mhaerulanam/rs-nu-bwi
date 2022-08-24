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
    @if (!$fasIgd->isEmpty())
        @foreach ($fasIgd as $data)
            <!-- Contact Section -->
            <section class="blog-section bg-gray section style-three pb-0">
                <div class="section-title text-center" style="margin-bottom: 40px">
                    <h3>Daftar
                        <span>IGD</span>
                    </h3>
                </div>
                <div class="container" style="margin-bottom: 120px">
                    <center>
                        <img src="/upload/fas-igd/{{ $data->image }}" style="object-fit: cover" width="1000px"
                            alt="Appointment">
                    </center>
                    <div class="col-md-12" style="margin-top: 24px">
                        <div class="contact-area style-two">
                            <div class="section-title">
                                <h3>Deskripsi</h3>
                            </div>
                            <div name="contact_form" class="default-form contact-form" action="sendmail.php" method="post">
                                <div class="row" style="padding: 16px;">
                                    <p style="text-align: justify; padding-right:50px">
                                        {!! $data->description !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
        <center style="margin-bottom: 24px">
            {{ $fasIgd->links() }}
        </center>
    @endif
@stop
