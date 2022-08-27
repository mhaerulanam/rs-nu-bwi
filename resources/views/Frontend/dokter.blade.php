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
    <section class="team-section section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3>Daftar Dokter
                            <span>& Jadwal</span>
                        </h3>
                    </div>
                    <div class="tab-content">
                        <!--Start single tab content-->
                        <div class="team-members tab-pane fade in active row" id="doctor">
                            @foreach ($dokters as $data)
                                <a href="">
                                    <div class="col-md-3 col-sm-6">
                                        <div class="team-person text-center">
                                            <img src="/upload/dokter/{{ $data->image }}" class="img-responsive"
                                                style="height: 280px;  object-fit: cover; !important" alt="dokter">
                                            <h6 style="color: rgb(24, 128, 67)">{{ $data->name }}</h6>
                                            <p style="color: rgb(86, 197, 150)">{{ $data->jabatan }}</p>
                                            <center>
                                                <div
                                                    style="background: rgb(240, 240, 240);  border-radius: 5pt; width: 200px; padding:10px; text-align: center; width:auto;">
                                                    <p style="font-size: 12px; !important">{!! $data->jadwal !!}</p>
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <!--End single tab content-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <center style="margin-bottom: 40px">
        {{ $dokters->links() }}
    </center>
@stop
