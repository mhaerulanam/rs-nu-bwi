<table id="example" class="table table-striped  table-bordered" style="width:100%">
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
                <td>{{ Carbon\Carbon::parse($data->created_at)->format('d - m - Y')  }}</td>
                <td>{{ $data->no_rm }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->layanan }}</td>
                {{--  <td>{{ $data->email }}</td>  --}}
                <td>{!! $data->kondisi_pasien !!}</td>
                <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('homecare-admin.destroy', $data->id) }}" method="POST">
                        <a href="{{ route('homecare-admin.edit', $data->id) }}"
                            class="btn btn-warning">EDIT</a>
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
