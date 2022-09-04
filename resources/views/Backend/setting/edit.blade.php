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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard/</span> Pengaturan </h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('setting.update', $settings->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            @if (strpos($settings->content, '.jpg') !== false || strpos($settings->content, '.png') !== false || strpos($settings->content, '.jepg') !== false)
                                <div class="row">
                                    <div class="col mb-2">
                                        <label for="image" class="form-label">Image</label>
                                        <input type='file' name="image" id="imgInp" class="form-control" />
                                    </div>
                                </div>
                                <div class="row g-2" style="margin-top: 16px">
                                    <div class="col mb-0">
                                        @if (isset($settings->content))
                                            <img width="200px" id="blah" src="{{ '/upload/setting/' . $settings->content }}"
                                                alt="your image" />
                                        @else
                                            <span style="color: red">Tidak ada gambar</span>
                                        @endif

                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="Content" class="form-label">Content sejarah</label>
                                        <textarea id="konten" name="content" rows="10" class="form-control" cols="50">{{ isset($settings->content) ? $settings->content : '' }}
                                        </textarea>
                                    </div>
                                </div>
                            @endif
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
