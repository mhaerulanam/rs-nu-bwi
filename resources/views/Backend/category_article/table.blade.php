<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($category_articles as $data)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $data->name_category }}</td>
                <td>
                    @if ($data->status == true)
                        <div class="badge badge-success">Aktif</div>
                    @else
                        <div class="badge badge-danger">Tidak Aktif</div>
                    @endif
                </td>
                <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('category-article.destroy', $data->id) }}" method="POST">
                        <a href="{{ route('category-article.edit', $data->id) }}"
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
