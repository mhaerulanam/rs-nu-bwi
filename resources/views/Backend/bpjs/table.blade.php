<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Image</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($bpjs as $data)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $data->title }}</td>
                <td>{!! $data->description !!}</td>
                <td>
                    @if ($data['image'] != null || $data['image'] != '')
                        <img src="/upload/bpjs/{{ $data->image }}" width="100">
                    @else
                        <span style="color: red">Tidak ada gambar</span>
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{ route('bpjs.edit', $data->id) }}" class="btn btn-warning">EDIT</a>
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-center text-mute" colspan="4">Data post tidak tersedia</td>
            </tr>
        @endforelse
    </tbody>
</table>
