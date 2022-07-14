@extends('layout_admin')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard/</span> Detail Konsultasi </h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <form action="{{ route('konsultasi-admin.update', $konsultasiAdmin->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <label for="nameExLarge" class="form-label text-end">Tanggal :
                                {{ $konsultasiAdmin->created_at->format('d - m - Y') }} </label>
                        </div>
                        <div class="row"
                            style="background: rgb(248, 248, 248); margin-left:0px; margin-right:0px; padding:16px;">
                            <center>
                                <label for="nameExLarge" class="form-label">Judul</label>
                                <p class="mb-0">{{ $konsultasiAdmin->title }}</p>
                            </center>
                        </div>
                        <hr class="my-0">
                        <div class="row" style="margin-top: 16px; margin-bottom:16px; margin-right:16px">
                            <div class="col">
                                <label for="nameExLarge" class="form-label">Nama Lengkap</label>
                                <p class="mb-0">{{ $konsultasiAdmin->name }}</p>
                            </div>
                            <div class="col">
                                <label for="nameExLarge" class="form-label">Pekerjaan</label>
                                <p class="mb-0">{{ $konsultasiAdmin->pekerjaan }}</p>
                            </div>
                            <div class="col">
                                <label for="nameExLarge" class="form-label">Email</label>
                                <p class="mb-0">{{ $konsultasiAdmin->email }}</p>
                            </div>
                        </div>
                        <hr class="my-0">
                        <div class="row" style="margin-top: 16px; margin-bottom:16px; margin-right:16px">
                            <label for="nameExLarge" class="form-label">Keluhan</label>
                            <p class="text-muted mb-0">{!! $konsultasiAdmin->keluhan !!}</p>
                        </div>
                        <hr class="my-0">
                        <div class="row" style="margin-top: 24px; margin-bottom:16px; margin-right:16px">
                            <div class="col mb-3">
                                <label for="balas" class="form-label">Respon Konsultasi</label>
                                @if ($konsultasiAdmin->balas != null)
                                    <p class="text-muted mb-0">{!! $konsultasiAdmin->balas !!}</p>
                                @else
                                    <textarea id="konten" class="form-control" name="balas" rows="10" cols="50"></textarea>
                                @endif
                            </div>
                        </div>
                        <hr class="my-0">
                        <div class="row" style="margin-top: 24px; margin-bottom:16px; margin-right:16px">
                            <div class="col" style="justify-content: end">
                                @if ($konsultasiAdmin->balas == null)
                                    <button type="submit" class="btn btn-dark">KIRIM</button>
                                @endif
                                <a href="/konsultasi-admin" class="btn btn-outline-dark">Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

<script>
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>
