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
                <h3>Kamar
                    <span>Rawat Inap</span>
                </h3>
            </div>
            @if (!$fasInap->isEmpty())
                <div class="row items-container clearfix" style="max-height: 450px;">
                    @foreach ($fasInap as $data)
                        <div class="item" style="max-height: 450px;">
                            <div class="inner-box"style="max-height: 450px;">
                                <div class="img_holder">
                                    <a href="service.html">
                                        <img src="/upload/fas-inap/{{ $data->image }}" style="height: 200px; object-fit: cover;"
                                            alt="images" class="img-responsive">
                                    </a>
                                </div>
                                <div class="image-content text-center" style="max-height: 220px">
                                    <a href="service.html">
                                        <h6 style="color: #ffaa01">{{ $data->title }}</h6>
                                    </a>
                                    <button type="button" class="btn btn-main" data-toggle="modal"
                                    data-target="#myModal" onclick="changeText('{!! $data->description !!}', '{{ $data->title }}')">
                                    Lihat Deskripsi
                                </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
    <center style="margin-bottom: 24px">
        {{ $fasInap->links() }}
    </center>

    <div class="container">
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Deskripsi <span id="heading"></span>
                        </h4>
                        <button type="button" class="close"
                            data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p id="pDescription"></p>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        function changeText(description, title){
            var header = document.getElementById("heading");
            header.innerHTML = title;
            var d = document.getElementById("pDescription");
            d.innerHTML = description;

        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
@stop
