<table id="example" class="table table-bordered" style="width:100%">
    <thead>
        <tr>
            <th></th>
            <th>Tanggal</th>
            <th>Judul</th>
            <th>Nama</th>
            <th>Pekerjaan</th>
            <th>Email</th>
            <th>Keluhan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($konsultasiAdmin as $data)
            <tr class="{{ $data->status_admin ? '' : 'bg-light' }}">
                <td>
                    @if ($data->status_admin)
                        <div class="statuss"></div>
                    @else
                        <div class="statuss active"></div>
                    @endif
                </td>
                <td>{{ $data->created_at->format('d - m - Y') }}</td>
                <td>{{ $data->title }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->pekerjaan }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ Str::limit($data->keluhan, 100, $end = ' ...') }}</td>
                <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('konsultasi-admin.destroy', $data->id) }}" method="POST">
                        @if ($data->balas != null)
                            <a href="/konsultasi-admin/{{ $data->id }}/detail"
                                class="btn btn-outline-dark">LIHAT</a>
                        @else
                            <a href="/konsultasi-admin/{{ $data->id }}/detail" class="btn btn-dark">BALAS</a>
                        @endif
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
