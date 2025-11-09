<!DOCTYPE html>
<html>
<head>
    <title>KRS Mahasiswa</title>
    <style>
        body {
            font-family: sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1, .header h2, .header p {
            margin: 0;
        }
        .student-info {
            margin-bottom: 20px;
        }
        .student-info table {
            width: 100%;
            border-collapse: collapse;
        }
        .student-info th, .student-info td {
            padding: 5px;
            text-align: left;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        thead {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Kartu Rencana Studi (KRS)</h2>
        <p>Tahun Akademik {{ date('Y') }}/{{ date('Y') + 1 }}</p>
    </div>

    <div class="student-info">
        <table>
            <tr>
                <th>Nama</th>
                <td>: {{ $mahasiswa->nama }}</td>
            </tr>
            <tr>
                <th>NIM</th>
                <td>: {{ $mahasiswa->nim }}</td>
            </tr>
            <tr>
                <th>Program Studi</th>
                <td>: {{ $mahasiswa->prodi->nama_prodi }}</td>
            </tr>
        </table>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode MK</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Semester</th>
            </tr>
        </thead>
        <tbody>
            @php $totalSks = 0; @endphp
            @forelse($pengambilanMKs as $index => $pengambilan)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $pengambilan->matakuliah->kode_mk }}</td>
                <td>{{ $pengambilan->matakuliah->nama }}</td>
                <td>{{ $pengambilan->matakuliah->sks }}</td>
                <td>{{ $pengambilan->matakuliah->semester }}</td>
            </tr>
            @php $totalSks += $pengambilan->matakuliah->sks; @endphp
            @empty
            <tr>
                <td colspan="5" style="text-align: center;">Anda belum mengambil mata kuliah apapun.</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" style="text-align: right; font-weight: bold;">Total SKS</td>
                <td colspan="2" style="font-weight: bold;">{{ $totalSks }}</td>
            </tr>
        </tfoot>
    </table>

</body>
</html>
