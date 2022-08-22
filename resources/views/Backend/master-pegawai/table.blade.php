<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pegawai</th>
            <th>Email</th>
            <th>Jabatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($masterPegawai as $data)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>
                    @if ( $data->role == 1 )
                        <div class="badge badge-dark">Administrator</div>
                    @else
                        <div class="badge badge-success">Perawat</div>
                    @endif
                </td>
                <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('master-pegawai.destroy', $data->id) }}" method="POST">
                        <a href="{{ route('master-pegawai.edit', $data->id) }}"
                            class="btn btn-warning">EDIT</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">HAPUS</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-center text-mute" colspan="4">Data pegawai tidak tersedia</td>
            </tr>
        @endforelse
    </tbody>
</table>
