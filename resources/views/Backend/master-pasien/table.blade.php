<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Tanggal</th>
            {{--  <th>No</th>  --}}
            <th>No RM</th>
            <th>Nama Pasien</th>
            <th>Alamat</th>
            {{--  <th>Diagnosa</th>
            <th>Layanan</th>  --}}
            <th>Email</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($masterPasien as $data)
            <tr>
                <td>{{ Carbon\Carbon::parse($data->created_at)->format('d - m - Y')  }}</td>
                {{--  <td scope="row">{{ $loop->iteration }}</td>  --}}
                <td>{{ $data->no_rm }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->alamat }}</td>
                {{--  <td>{{ $data->diagnosa }}</td>
                <td>{{ $data->layanan }}</td>  --}}
                <td>{{ $data->email }}</td>
                <td>{!! $data->keterangan !!}</td>
                <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('master-pasien.destroy', $data->no_rm) }}" method="POST">
                        <a href="{{ route('master-pasien.edit', $data->no_rm) }}"
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
