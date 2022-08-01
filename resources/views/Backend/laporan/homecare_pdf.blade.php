<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<?php
function tanggal_indonesia($tanggal)
{
    $bulan = [
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember',
    ];

    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}
?>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Homecare RS NU Banyuwangi</h4>
        </h5>
    </center>


    <div class="row">
        <div class="col-md-12">
            <span style="font-size: 12px"> Tanggal : {{ tanggal_indonesia($start_date) . ' s/d ' . tanggal_indonesia($end_date) }}</span>
        </div>
    </div>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>No RM</th>
                <th>Nama Pasien</th>
                <th>Alamat</th>
                <th>Layanan</th>
                <th>Kondisi Pasien</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @forelse ($dataHomecare as $data)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ Carbon\Carbon::parse($data->created_at)->format('d - m - Y') }}</td>
                    <td>{{ $data->no_rm }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->layanan }}</td>
                    {{-- <td>{{ $data->email }}</td> --}}
                    <td>{!! $data->kondisi_pasien !!}</td>
                </tr>
            @empty
                <tr>
                    <td class="text-center text-mute" colspan="4">Data tidak tersedia</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>
