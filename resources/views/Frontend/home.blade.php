@extends('layout')
@section('content')
    <!--=================================
                                        =            Page Slider            =
                                        ==================================-->
    <div class="hero-slider">
        @if (!$banners->isEmpty())
            @foreach ($banners as $no => $data)
                <div class="slider-item slide{{ $no }}"
                    style="background-image:url(upload/banner/{{ $data->image }})">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <!-- Slide Content Start -->
                                <div class="content style text-center">
                                    <h2 class="text-white text-bold mb-2">Our Best Surgeons</h2>
                                    <p class="tag-text mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel
                                        sunt animi
                                        sequi ratione quod at earum. <br>
                                        Quis quos officiis numquam!</p>
                                    {{-- <a href="#" class="btn btn-main btn-white">explore</a> --}}
                                </div>
                                <!-- Slide Content End -->
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        <div class="slider-item" style="background-image:url(upload/banner/default-banner.png)">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Slide Content Start -->
                        <div class="content style text-center">
                            <h2 class="text-white text-bold mb-2">Our Best Surgeons</h2>
                            <p class="tag-text mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel sunt animi
                                sequi ratione quod at earum. <br>
                                Quis quos officiis numquam!</p>
                            {{-- <a href="#" class="btn btn-main btn-white">explore</a> --}}
                        </div>
                        <!-- Slide Content End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- END Banner --}}

    <!--Service Section-->
    <section class="service-section bg-gray section">
        <div class="container">
            <div class="section-title text-center">
                <h3>Fasilitas
                    <span>Rumah Sakit</span>
                </h3>
                {{-- <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet. qui suscipit atque
                    <br>
                    fugiat officia corporis rerum eaque neque totam animi, sapiente culpa. Architecto!</p> --}}
            </div>

            @if (!$fasilitas->isEmpty())
                <div class="row items-container clearfix">
                    @foreach ($fasilitas as $data)
                        <div class="item">
                            <div class="inner-box">
                                <div class="img_holder">
                                    <a href="service.html">
                                        <img src="upload/fasilitas/{{ $data->image }}" style="height: 200px"
                                            alt="images" class="img-responsive">
                                    </a>
                                </div>
                                <div class="image-content text-center">
                                    <a href="service.html">
                                        <h6>{{ $data->name }}</h6>
                                    </a>
                                    <p>{{ Str::limit($data->description, 200, $end = ' ...') }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
    <!--End Service Section-->

    <!--team section-->
    <section class="team-section section">
        <div class="container">
            <div class="section-title text-center">
                <h3>Artikel
                    <span>Kesehatan</span>
                </h3>
            </div>
            <div class="row">
                @if (!$articles->isEmpty())
                    @foreach ($articles as $data)
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="team-member">
                                <img src="upload/articles/{{ $data->image }}" alt="doctor" style="height: 200px"
                                    class="img-responsive">
                                <div class="contents text-center" style="margin-height: 20px">
                                    <h4>{{ $data->title }}</h4>
                                    <p>{{ Str::limit($data->description, 200, $end = ' ...') }}</p>
                                    <a href="#" class="btn btn-main">read more</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <center style="margin-bottom: 24px">
        {{ $articles->links() }}
    </center>
    <!--End team section-->
@stop
