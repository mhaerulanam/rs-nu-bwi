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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard/</span> Pegawai </h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('master-pegawai.update', $masterPegawai->id) }}" method="POST"
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
                                            placeholder="Masukkan Nama Lengkap"  value="{{ isset($masterPegawai->name) ? $masterPegawai->name : '' }}"/>
                                    </div>
                                </div>
                                <div class="col mb-0">
                                    <div class="mb-3">
                                        <label for="nameExLarge" class="form-label">Email <span
                                                style="font-size: 12px; color:red;">*</span></label>
                                        <input type="email" id="nameExLarge" class="form-control" name="email" value="{{ isset($masterPegawai->email) ? $masterPegawai->email : '' }}"
                                            placeholder="Masukkan Email Aktif" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label">Jabatan <span
                                            style="font-size: 12px; color:red;">*</span></label><br>
                                    <div class="form-check form-check-inline mt-3">
                                        <input class="form-check-input" type="radio" name="jabatan"
                                            id="admin" value="1" {{ $masterPegawai->role == 1 ? "checked" : '' }}/>
                                        <label class="form-check-label" for="inlineRadio1">Administrator</label>
                                    </div>
                                    <div class="form-check form-check-inline mt-3">
                                        <input class="form-check-input" type="radio" name="jabatan"
                                            id="perawat" value="3" {{ $masterPegawai->role == 3 ? "checked" : '' }}/>
                                        <label class="form-check-label" for="inlineRadio1">Perawat</label>
                                    </div>
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
