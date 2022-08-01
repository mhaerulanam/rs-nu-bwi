<table id="example" class="table table-striped  table-bordered" style="width:100%">
    <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
            Cetak PDF
        </button>
        <!-- Modal -->
        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('homecare-admin') }}" method="post" id="form-print-pdf" target="_blank">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">No RM</label>
                                    <input type="text" id="noRm" name="noRm" class="form-control"
                                        placeholder="Masukkan No RM" />
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-0">
                                    <label for="date_awal" class="form-label">Tanggal Awal</label>
                                    <input type="date" name="date_awal" id="date_awal"
                                        class="form-control" />
                                </div>
                                <div class="col mb-0">
                                    <label for="date_akhir" class="form-label">Tanggal Akhir</label>
                                    <input type="date" name="date_akhir" id="date_akhir"
                                        class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            {{-- <a href="javascript:printPdf();" class="btn btn-success">Print PDF</a> --}}
                            <button type="submit" class="btn btn-success" >Print PDF</button>
                            {{-- <a href="javascript:printPdf();" class="btn btn-success" target="_blank">Print PDF</a> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <br />
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>No RM</th>
            <th>Nama Pasien</th>
            <th>Alamat</th>
            <th>Layanan</th>
            <th>Kondisi Pasien</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($homecareAdmin as $data)
            <tr>
                <td>{{ Carbon\Carbon::parse($data->created_at)->format('d - m - Y') }}</td>
                <td>{{ $data->no_rm }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->layanan }}</td>
                {{-- <td>{{ $data->email }}</td> --}}
                <td>{!! $data->kondisi_pasien !!}</td>
                <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('homecare-admin.destroy', $data->id) }}" method="POST">
                        <a href="{{ route('homecare-admin.edit', $data->id) }}" class="btn btn-warning">EDIT</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">HAPUS</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-center text-mute" colspan="4">Data tidak tersedia</td>
            </tr>
        @endforelse
    </tbody>
</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $("form-print-pdf").submit(function(event) {
        let _token = $('meta[name="csrf-token"]').attr("content");
        var noRm = $('#noRm').val();
        var tanggalAwal = $('#date_awal').val;
        var tanggalAkhir = $('#date_akhir').val;

        console.log("asasa");
        return;
        if (Date.parse(tanggalAkhir) > Date.parse(tanggalAwal)) {
            $.ajax({
                type: "post",
                url: "/print-pdf-homecare",
                data: {
                    no_rm: noRm,
                    tanggal_awal: tanggalAwal,
                    tanggal_akhir: tanggalAkhir,
                    _token: _token,
                },
                success: function(data) {
                    if (data) {
                        console.log(data);
                    }
                },
                error: function(data) {
                    // if error occured
                    alert("Error occured, please try again");
                },
            });
        } else {
            alert("Valid date Range");
        }
    });
</script>
