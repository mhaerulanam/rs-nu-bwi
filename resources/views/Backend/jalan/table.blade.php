<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Image</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($jalans as $data)
            <tr>
                <td>
                    @if ($data['image'] != null || $data['image'] != '')
                        <img src="/upload/jalan/{{ $data->image }}" width="800">
                    @else
                        <span style="color: red">Tidak ada gambar</span>
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{ route('alur-jalan.edit', $data->id) }}"
                        class="btn btn-warning">EDIT</a>
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-center text-mute" colspan="4">Data tidak tersedia</td>
            </tr>
        @endforelse
    </tbody>
</table>
