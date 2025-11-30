<!DOCTYPE html>
<html>
<head>
    <title>Jadwal Kuliah</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #333;
            font-size: 12px;
        }
        .header {
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
            position: relative;
        }
        .header img {
            width: 80px;
            height: auto;
            position: absolute;
            top: 10px;
            left: 10px;
        }
        .logo-right {
            position: absolute;
            top: 10px;
            right: 10px; /* Added right padding */
            width: 90px; /* Reduced width slightly */
            height: auto;
        }
        .header h2 {
            margin: 0;
            font-size: 18px;
        }
        .header p {
            margin: 5px 0;
            font-size: 14px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        .table th {
            background-color: #004488;
            color: #fff;
            font-weight: bold;
            text-align: center;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .table td {
            vertical-align: middle;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 10px;
            color: #777;
        }
        .text-center {
            text-align: center;
        }
        .no-data {
            text-align: center;
            padding: 20px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="header">
                

        <h2>JADWAL KULIAH</h2>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Hari</th>
                <th>Jam</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Program Studi</th>
                <th>Semester</th>
                <th>Dosen</th>
                <th>Ruang</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jadwalKuliah as $j)
            <tr>
                <td>{{ $j->hari->nama_hari ?? '-' }}</td>
                <td class="text-center">
                    {{ \Carbon\Carbon::parse($j->jam_mulai)->format('H:i') ?? '-' }} - {{ \Carbon\Carbon::parse($j->jam_selesai)->format('H:i') ?? '-' }} WIB
                </td>
                <td>{{ $j->pengampu->matakuliah->nama ?? '-' }}</td>
                <td class="text-center">{{ $j->pengampu->matakuliah->sks ?? '-' }}</td>
                <td>{{ $j->pengampu->prodi->nama_prodi ?? '-' }}</td>
                <td class="text-center">{{ $j->pengampu->matakuliah->semester ?? '-' }}</td>
                <td>
                    @foreach ($j->pengampu->dosen as $dosen)
                        {{ $dosen->nama }}<br>
                    @endforeach
                </td>
                <td class="text-center">{{ $j->ruang->nama_ruang ?? '-' }}</td>
                <td class="text-center">{{ $j->pengampu->kelas->nama_kelas ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="no-data">Tidak ada data jadwal kuliah yang tersedia.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Dokumen ini dibuat pada {{ \Carbon\Carbon::now(config('app.timezone'))->translatedFormat('d F Y H:i') }}
    </div>
</body>
</html>
