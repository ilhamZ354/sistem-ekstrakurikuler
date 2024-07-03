<!DOCTYPE html>
<html>
<head>
    <title>Data Kegiatan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
            font-size: 12px;
        }
        .small-font th, .small-font td {
            font-size: 8px;
        }
    </style>
</head>
<body>
    <h3>Laporan Kegiatan</h3>
    @if(isset($data) && !empty($data))
        <table class="small-font">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bulan</th>
                    <th>Nama kegiatan</th>
                    <th>Jumlah pertemuan</th>
                    <th>Pembimbing</th>
                    <th>Tempat kegiatan</th>
                    <th>Jumlah peserta</th>
                    <th>Total kehadiran</th>
                    <th>Rata-rata nilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->bulan }}</td>
                        <td>{{ $item->kegiatan_nama }}</td>
                        <td>{{ $item->total_pertemuan }}</td>
                        <td>{{ $item->pembimbing }}</td>
                        <td>{{ $item->tempat }}</td>
                        <td>{{ $item->total_peserta }}</td>
                        <td>{{ $item->total_hadir }}</td>
                        <td>{{ round($item->average_nilai, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada data yang tersedia untuk bulan ini.</p>
    @endif
</body>
</html>
