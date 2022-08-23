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
                        <h3>Poli
                            <span>& Jadwal Dokter</span>
                        </h3>
                    </div>
                    <div class="tab-content">
                        <!--Start single tab content-->
                        <div class="team-members tab-pane fade in active row" id="doctor">
                            <div class="grid-container">
                                @foreach ($poli as $dataPoli)
                                    <div class="grid-item">
                                        <div class="container-jadwal">
                                            <div class="header-jadwal">
                                                <div class="text-header">{{ $dataPoli->title }}</div>
                                            </div>
                                            @foreach ($dokters as $data)
                                                @if ($data->id_poli == $dataPoli->id_poli)
                                                    <div class="content-jadwal">
                                                        <div class="header-content-jadwal">
                                                            <div class="text-content">{{ $data->name }}</div>
                                                        </div>
                                                        <div class="jadwal">
                                                            <div class="text-jadwal">{!! $data->jadwal !!}</div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!--End single tab content-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <center style="margin-bottom: 40px">
        {{ $poli->links() }}
    </center>
@stop
