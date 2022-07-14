<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Layanan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($masterLayanan as $data)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $data->layanan }}</td>
                <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('master-layanan.destroy', $data->id) }}" method="POST">
                        <a href="{{ route('master-layanan.edit', $data->id) }}"
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
