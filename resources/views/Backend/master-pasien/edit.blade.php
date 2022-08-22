@extends('layout_admin')
@section('content')
    {{-- menampilkan error validasi --}}
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard/</span> Pasien </h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('master-pasien.update', $masterPasien->no_rm) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="modal-body">
                            <div class="row g-2">
                                <div class="col mb-0">
                                    <div class="mb-3">
                                        <label for="nameExLarge" class="form-label">Nama Lengkap <span
                                                style="font-size: 12px; color:red;">*</span></label>
                                        <input type="text" id="nameExLarge" class="form-control" name="name"
                                            placeholder="Masukkan Nama Lengkap"  value="{{ isset($masterPasien->name) ? $masterPasien->name : '' }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-0">
                                    <div class="mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Diagnosa <span
                                                style="font-size: 12px; color:red;">*</span></label>
                                        <select class="form-select" id="exampleFormControlSelect1" name="diagnosa" required
                                            aria-label="Default select example">
                                            <option selected disabled>Pilih Diagnosa</option>
                                            @foreach ($masterDiagnosa as $data_diagnosa)
                                                <option value="{{ $data_diagnosa->id }}"
                                                    {{ $masterPasien->id_diagnosa == $data_diagnosa->id ? 'selected' : '' }}>
                                                    {{ $data_diagnosa->diagnosa }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col mb-0">
                                    <div class="mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Tindakan <span
                                                style="font-size: 12px; color:red;">*</span></label>
                                        <select class="form-select" id="exampleFormControlSelect1" name="layanan" required
                                            aria-label="Default select example">
                                            <option selected disabled>Pilih Tindakan</option>
                                            @foreach ($masterLayanan as $data_layanan)
                                            <option value="{{ $data_layanan->id }}"
                                                {{ $masterPasien->id_layanan == $data_layanan->id ? 'selected' : '' }}>
                                                {{ $data_layanan->layanan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="deskripsi" class="form-label">Alamat Pasien <span
                                            style="font-size: 12px; color:red;">*</span></label>
                                    <textarea id="" class="form-control" name="alamat" rows="4" cols="50">{{ isset($masterPasien->alamat) ? $masterPasien->alamat : '' }}
                                    </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="deskripsi" class="form-label">Keterangan</label>
                                    <p style="font-size: 12px; color:red;">Dapat dikosongi!</p>
                                    <textarea id="konten" class="form-control" name="keterangan" rows="10" cols="50">
                                        {{ isset($masterPasien->keterangan) ? $masterPasien->keterangan : '' }}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="/master-pasien"  class="btn btn-outline-primary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
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
