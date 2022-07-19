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
        <div class="slider-item" style="background-image:url(/upload/banner/default-banner.png)">
        </div>
    </div>
    {{-- END Banner --}}
    <section class="service-section bg-gray section">
        <div class="container">
            <div class="section-title text-center">
                <h3>Daftar
                    <span>Poli</span>
                </h3>
            </div>
            @if (!$fasPoli->isEmpty())
                <div class="row items-container clearfix" style="max-height: 450px;">
                    @foreach ($fasPoli as $data)
                        <div class="item" style="max-height: 450px;">
                            <div class="inner-box"style="max-height: 450px;">
                                <div class="img_holder">
                                    <a href="service.html">
                                        <img src="/upload/fas-poli/{{ $data->image }}" style="height: 200px; object-fit: cover;"
                                            alt="images" class="img-responsive">
                                    </a>
                                </div>
                                <div class="image-content text-center" style="max-height: 220px">
                                    <a href="service.html">
                                        <h6 style="color: #ffaa01">{{ $data->title }}</h6>
                                    </a>
                                    {{--  <p>{{ Str::limit($data->description, 180, $end = ' ...') }}</p>  --}}
                                    <a href="#" class="btn btn-main">Lihat</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
    <!--team section-->
    {{--  <center style="margin-bottom: 24px">
        {{ $fasPoli->links() }}
    </center>  --}}
    <!--End team section-->
@stop
