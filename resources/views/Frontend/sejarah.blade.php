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
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Slide Content Start -->
                        {{--  <div class="content style text-center">
                            <h2 class="text-white text-bold mb-2">Our Best Surgeons</h2>
                            <p class="tag-text mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel sunt animi
                                sequi ratione quod at earum. <br>
                                Quis quos officiis numquam!</p>
                        </div>  --}}
                        <!-- Slide Content End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- END Banner --}}

    <!-- Contact Section -->
    <section class="blog-section section style-three pb-0" style=" background-image: url('/assets/bg/bg5.jpg');  background-size: cover; background-repeat: no-repeat; margin-bottom: 24px;">
        <div class="container">
            @foreach ($sejarahs as $data)
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="contact-area style-two">
                            <div class="section-title">
                                <h3>{{ $data->name }}</h3>
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
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="appointment-image-holder">
                            <figure>
                                <img src="/upload/sejarah/{{ $data->image }}" style="object-fit: cover" height="500px" width="500px" alt="Appointment">
                            </figure>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- End Contact Section -->


    <center>
        {{ $sejarahs->links() }}
    </center>
@stop
