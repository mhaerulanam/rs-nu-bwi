<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Content</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($settings as $data)
            <tr>
                <td>
                    @if (strpos($data->content, '.jpg') !== false || strpos($data->content, '.png') !== false || strpos($data->content, '.jepg') !== false)
                        @if ($data->content != null || $data->content != '')
                            <img src="/upload/setting/{{ $data->content }}" width="300">
                        @else
                            <span style="color: red">Tidak ada gambar</span>
                        @endif
                    @else
                        <p>{!! $data->content !!}</p>
                    @endif

                </td>
                <td class="text-center">
                    <a href="{{ route('setting.edit', $data->id) }}"
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
