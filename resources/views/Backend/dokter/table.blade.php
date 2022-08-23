<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Foto</th>
            <th>Jabatan</th>
            <th>Poli</th>
            <th>Jadwal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($dokters as $data)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $data->name }}</td>
                <td>
                    @if ($data->image != null || $data->image != '')
                        <img src="/upload/dokter/{{ $data->image }}" width="100">
                    @else
                        <span style="color: red">Tidak ada gambar</span>
                    @endif
                </td>
                <td>{{ $data->jabatan }}</td>
                <td>{{ $data->title_poli }}</td>
                <td>{!! $data->jadwal !!}</td>
                <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('dokter.destroy', $data->id) }}" method="POST">
                        <a href="{{ route('dokter.edit', $data->id) }}"
                            class="btn btn-warning">EDIT</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">HAPUS</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-center text-mute" colspan="4">Data post tidak tersedia</td>
            </tr>
        @endforelse
    </tbody>
</table>
