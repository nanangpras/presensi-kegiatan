@php
    header('Content-Transfer-Encoding: none');
    header("Content-type: application/vnd-ms-excel");
    header("Content-type: application/x-msexcel");
    header("Content-Disposition: attachment; filename=Presensi- " . $kegiatankurban->nama . " - " . date('Y-m-d') . ".xls");
    // header("Content-Disposition: attachment; filename=Presensi " . date('Y-m-d') . ".xls");
@endphp


<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Warga</th>
            <th>Cabang</th>
            <th>Bagian</th>
            <th>Waktu kehadiran</th>
            <th>Usia</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cetak as $row)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->nama_warga}}</td>
            <td>{{ $row->nama_cabang }}</td>
            <td>{{ $row->bagian_panitia }}</td>
            <td>{{ $row->created_at }}</td>
            <td>1</td>
        </tr>
        @endforeach
    </tbody>
</table>

