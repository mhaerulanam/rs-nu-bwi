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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard/</span> Banner </h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('banner.update', $banners->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameExLarge" class="form-label">Nama Banner</label>
                                    <input type="text" id="nameExLarge" class="form-control" name="name_banner"
                                        placeholder="Masukkan Nama Banner"
                                        value="{{ isset($banners->name_banner) ? $banners->name_banner : '' }}" />
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-0">
                                    <label for="image" class="form-label">Image</label>
                                    <input type='file' name="image" id="imgInp" class="form-control" />
                                </div>
                                <div class="col mb-0">
                                    <div class="form-check mt-3">
                                        <input type="hidden" name="status" value="0">
                                        <input type="checkbox" value="1" class="form-check-input" id="scales"
                                            name="status"
                                            {{ isset($banners->status) && $banners->status == true ? 'checked' : '' }}>
                                        <label class="form-check-label" for="defaultCheck1"> Status </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2" style="margin-top: 16px">
                                <div class="col mb-0">
                                    @if (isset($banners->image))
                                        <img width="200px" id="blah" src="{{ '/upload/banner/' . $banners->image }}"
                                            alt="your image" />
                                    @else
                                        <span style="color: red">Tidak ada gambar</span>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
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
