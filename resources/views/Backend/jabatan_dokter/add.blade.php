<div class="card-header d-flex align-items-center justify-content-between">
    <h5 class="mb-0">Tabel Data Jabatan</h5>
    <small class="text-muted float-end" style="margin-right: 24px">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exLargeModal2">
            ++ Tambah Data
        </button>
    </small>
</div>

<!-- Extra Large Modal -->
<div class="modal fade" id="exLargeModal2" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form name="add-blog-post-form" id="add-blog-post-form" method="post"
                action="{{ url('jabatan-dokter') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel4">Tambah Data Jabatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col g-2">
                            <label for="nameExLarge" class="form-label">Nama Jabatan</label>
                            <input type="text" id="nameExLarge" class="form-control" name="jabatan"
                                placeholder="Masukkan Jabatan" />
                        </div>
                        <div class="col mb-0">
                            <div class="form-check mt-3">
                                <input type="hidden" name="status" value="0">
                                <input type="checkbox" value="1" class="form-check-input" id="scales"
                                    name="status">
                                <label class="form-check-label" for="defaultCheck1"> Status </label>
                            </div>
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
