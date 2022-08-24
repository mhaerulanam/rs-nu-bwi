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
    <section class="gallery bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3>Daftar
                            <span>Galeri</span>
                        </h3>
                    </div>
                </div>
                @if (!$galeris->isEmpty())
                    @foreach ($galeris as $data)
                        <div class="col-md-4 col-sm-6">
                            <div class="gallery-item">
                                <img src="/upload/galeri/{{ $data->image }}" class="img-responsive" style="object-fit: cover; height: 300px !important" alt="Gallery image {{ $data->title }}">
                                <a data-fancybox="images" href="/upload/galeri/{{ $data->image }}"></a>
                                <h3>{{ $data->title }}</h3>
                                <p>{!! strip_tags(Str::limit($data->description, 50, $end = ' ...')) !!}</p>
                            </div>
                        </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </section>
        <center style="margin-bottom: 24px">
            {{ $galeris->links() }}
        </center>

@stop
