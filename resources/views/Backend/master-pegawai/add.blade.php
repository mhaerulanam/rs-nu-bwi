<div class="card-header d-flex align-items-center justify-content-between">
    <h5 class="mb-0">Tabel Data Master Pegawai</h5>
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
            <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{ url('master-pegawai') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel4">Tambah Data Pegawai</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col mb-0">
                            <div class="mb-3">
                                <label for="nameExLarge" class="form-label">Nama Lengkap <span
                                        style="font-size: 12px; color:red;">*</span></label>
                                <input type="text" id="nameExLarge" class="form-control" name="name"
                                    placeholder="Masukkan Nama Lengkap" />
                            </div>
                        </div>
                        <div class="col mb-0">
                            <div class="mb-3">
                                <label for="nameExLarge" class="form-label">Email <span
                                        style="font-size: 12px; color:red;">*</span></label>
                                <input type="email" id="nameExLarge" class="form-control" name="email"
                                    placeholder="Masukkan Email Aktif" />
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <div class="mb-3">
                                <div class="mt-4">
                                    <div class="form-password-toggle">
                                        <label for="password_confirmation" class="form-label">Password : <span
                                                style="font-size: 12px; color:red;">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" name="password" required autocomplete="new-password"
                                                id="basic-default-password32" class="form-control" />
                                            <span class="input-group-text cursor-pointer" id="basic-default-password"><i
                                                    class="bx bx-hide"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-0">
                            <div class="mb-3">
                                <div class="mt-4">
                                    <div class="form-password-toggle">
                                        <label for="password_confirmation" class="form-label">Konfirmasi Password :
                                            <span style="font-size: 12px; color:red;">*</span></label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" name="password_confirmation" required
                                                id="basic-default-password32" class="form-control" />
                                            <span class="input-group-text cursor-pointer" id="basic-default-password"><i
                                                    class="bx bx-hide"></i></span>
                                        </div>
                                    </div>


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
                                        id="admin" value="1" />
                                    <label class="form-check-label" for="inlineRadio1">Administrator</label>
                                </div>
                                <div class="form-check form-check-inline mt-3">
                                    <input class="form-check-input" type="radio" name="jabatan"
                                        id="perawat" value="3" />
                                    <label class="form-check-label" for="inlineRadio1">Perawat</label>
                                </div>
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


<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });

    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>
