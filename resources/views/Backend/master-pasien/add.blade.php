<div class="card-header d-flex align-items-center justify-content-between">
    <h5 class="mb-0">Tabel Data Master Pasien</h5>
    <center>
        <p>Default Password User : <span style="color: red">pWd-rme9?o</span> </p>
    </center>
    <small class="text-muted float-end" style="margin-right: 24px">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exLargeModal">
            ++ Tambah Data
        </button>
    </small>
</div>

<!-- Extra Large Modal -->
<div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{ url('master-pasien') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel4">Tambah Data Pasien</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col mb-0">
                            <div class="mb-3">
                                <label for="nameExLarge" class="form-label">Nama Lengkap <span style="font-size: 12px; color:red;">*</span></label>
                                <input type="text" id="nameExLarge" class="form-control" name="name"
                                    placeholder="Masukkan Nama Lengkap" />
                            </div>
                        </div>
                        <div class="col mb-0">
                            <div class="mb-3">
                                <label for="nameExLarge" class="form-label">Email <span style="font-size: 12px; color:red;">*</span></label>
                                <input type="email" id="nameExLarge" class="form-control" name="email"
                                    placeholder="Masukkan Email Aktif" />
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Diagnosa <span style="font-size: 12px; color:red;">*</span></label>
                                <select class="form-select" id="exampleFormControlSelect1" name="diagnosa" required
                                    aria-label="Default select example">
                                    <option selected disabled>Pilih Diagnosa</option>
                                    @foreach ($masterDiagnosa as $data_diagnosa)
                                        <option value="{{ $data_diagnosa->id }}">{{ $data_diagnosa->diagnosa}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col mb-0">
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Tindakan <span style="font-size: 12px; color:red;">*</span></label>
                                <select class="form-select" id="exampleFormControlSelect1" name="layanan" required
                                    aria-label="Default select example">
                                    <option selected disabled>Pilih Tindakan</option>
                                    @foreach ($masterLayanan as $data_layanan)
                                        <option value="{{ $data_layanan->id }}">{{ $data_layanan->layanan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="deskripsi" class="form-label">Alamat Pasien <span style="font-size: 12px; color:red;">*</span></label>
                            <textarea id="" class="form-control" name="alamat" rows="4" cols="50"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="deskripsi" class="form-label">Keterangan</label>
                            <p style="font-size: 12px; color:red;">Dapat dikosongi!</p>
                            <textarea id="konten" class="form-control" name="keterangan" rows="10" cols="50"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>
