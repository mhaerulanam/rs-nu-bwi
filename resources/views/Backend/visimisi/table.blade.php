<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($visimisi as $data)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $data->name }}</td>
                <td>{!! $data->description !!}</td>
                <td class="text-center">
                    <a href="{{ route('visimisi.edit', $data->id) }}"
                        class="btn btn-warning">EDIT</a>
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-center text-mute" colspan="4">Data post tidak tersedia</td>
            </tr>
        @endforelse
    </tbody>
</table>
