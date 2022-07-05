<div class="card-header d-flex align-items-center justify-content-between">
    <h5 class="mb-0">Tabel Data Artikel</h5>
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
            <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{ url('article') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel4">Tambah Data Article</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="nameExLarge" class="form-label">Judul Artikel</label>
                            <input type="text" id="nameExLarge" class="form-control" name="title"
                                placeholder="Masukkan Judul Artikel" />
                        </div>
                        <div class="col mb-0">
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Kategori</label>
                                <select class="form-select" id="exampleFormControlSelect1" name="category" required
                                    aria-label="Default select example">
                                    <option selected disabled>Pilih Katgeori</option>
                                    @foreach ($category as $data_category)
                                        <option value="{{ $data_category->id }}">{{ $data_category->name_category}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="deskripsi" class="form-label">Konten Artikel</label>
                            <textarea id="description" name="description" rows="4" class="form-control" cols="50"></textarea>
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
                                    name="status">
                                <label class="form-check-label" for="defaultCheck1"> Status </label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2" style="margin-top: 16px">
                        <div class="col mb-0">
                            <img width="200px" id="blah" src="http://placehold.it/180" alt="your image" />
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
