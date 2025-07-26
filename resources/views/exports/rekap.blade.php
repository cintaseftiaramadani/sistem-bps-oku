<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rekap Penilaian Pegawai</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-family: sans-serif;
            font-size: 14px;
        }
        th, td {
            border: 1px solid #999;
            padding: 8px 10px;
            text-align: center;
        }
        thead {
            background-color: #f2f2f2;
        }
        h2, p {
            text-align: center;
            margin: 0;
        }
        p {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h2>Rekapitulasi Penilaian Kinerja Pegawai</h2>
    <br>

    <table>
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Nama Pegawai</th>
                <th rowspan="2">Jumlah Penilai</th>
                <th colspan="8">Nilai Aspek</th>
                <th rowspan="2">Total Poin</th>
                <th rowspan="2">Nilai Akhir</th>
            </tr>
            <tr>
                <th>Aspek 1</th>
                <th>Aspek 2</th>
                <th>Aspek 3</th>
                <th>Aspek 4</th>
                <th>Aspek 5</th>
                <th>Aspek 6</th>
                <th>Aspek 7</th>
                <th>Aspek 8</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rekap as $i => $r)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $r['name'] }}</td>
                    <td>{{ $r['jumlah_penilai'] }}</td>
                    <td>{{ $r['nilai_1'] ?? '0' }}</td>
                    <td>{{ $r['nilai_2'] ?? '0' }}</td>
                    <td>{{ $r['nilai_3'] ?? '0' }}</td>
                    <td>{{ $r['nilai_4'] ?? '0' }}</td>
                    <td>{{ $r['nilai_5'] ?? '0' }}</td>
                    <td>{{ $r['nilai_6'] ?? '0' }}</td>
                    <td>{{ $r['nilai_7'] ?? '0' }}</td>
                    <td>{{ $r['nilai_8'] ?? '0' }}</td>
                    <td>{{ $r['total_nilai'] }}</td>
                    <td>{{ number_format($r['nilai_akhir'], 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="13">Tidak ada data penilaian ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
