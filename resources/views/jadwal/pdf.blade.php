<!DOCTYPE html>
<html>
<head>
    <title>Jadwal Kuliah</title>
    <style>
        body {
            font-family: 'sans-serif';
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .table th {
            background-color: #f2f2f2;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Jadwal Kuliah</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Hari</th>
                <th>Jam</th>
                <th>Mata Kuliah</th>
                <th>Program Studi</th>
                <th>Semester</th>
                <th>Dosen</th>
                <th>Ruang</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jadwal as $j)
            <tr>
                <td>{{ $j->hari->nama_hari }}</td>
                <td>{{ \Carbon\Carbon::parse($j->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($j->jam_selesai)->format('H:i') }}</td>
                <td>{{ $j->pengampu->matakuliah->nama }} ({{ $j->pengampu->matakuliah->sks }} SKS)</td>
                <td>{{ $j->pengampu->prodi->nama_prodi ?? 'Prodi tidak ditemukan' }}</td>
                <td>{{ $j->pengampu->matakuliah->semester }}</td>
                <td>
                    @foreach ($j->pengampu->dosen as $dosen)
                        {{ $dosen->nama }}<br>
                    @endforeach
                </td>
                <td>{{ $j->ruang->nama_ruang }}</td>
                <td>{{ $j->pengampu->kelas->nama_kelas }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>