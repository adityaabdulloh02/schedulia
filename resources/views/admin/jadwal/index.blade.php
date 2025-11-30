@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <h3 class="me-3" style="color: white;">Jadwal Kuliah (Admin)</h3>
                        <a href="{{ route('jadwal.create') }}" class="btn btn-primary btn-sm me-2">Buat Jadwal</a>
                        <a href="{{ route('admin.jadwal.exportPDF', ['search' => request('search')]) }}" class="btn btn-success btn-sm me-2">Ekspor ke PDF</a>
                        <form action="{{ route('jadwal.generate') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin membuat jadwal otomatis? Ini mungkin memakan waktu beberapa saat.');">
                            @csrf
                            <button type="submit" class="btn btn-info btn-sm">Generate Jadwal Otomatis</button>
                        </form>
                    </div>
                    <form action="{{ route('admin.jadwal.index') }}" method="GET" class="d-flex">
                        <input type="text" name="search" class="form-control" placeholder="Pencarian..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary ms-2">Search</button>
                    </form>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th class="fw-bold" style="color: black; background-color: #d9edfc;">Hari</th>
                                    <th class="fw-bold" style="color: black; background-color: #d9edfc;">Jam</th>
                                    <th class="fw-bold" style="color: black; background-color: #d9edfc;">Mata Kuliah</th>
                                    <th class="fw-bold" style="color: black; background-color: #d9edfc;">Dosen</th>
                                    <th class="fw-bold" style="color: black; background-color: #d9edfc;">Ruang</th>
                                    <th class="fw-bold" style="color: black; background-color: #d9edfc;">Kelas</th>
                                    <th class="fw-bold" style="color: black; background-color: #d9edfc;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($jadwalKuliah as $j)
                                <tr>
                                    <td>{{ $j->hari->nama_hari ?? '-' }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($j->jam_mulai)->format('H:i') ?? '-' }} - {{ \Carbon\Carbon::parse($j->jam_selesai)->format('H:i') ?? '-' }}
                                    </td>
                                    <td>
                                        {{ $j->pengampu->matakuliah->nama ?? '-' }}
                                        ({{ $j->pengampu->matakuliah->sks }} SKS)
                                    </td>
                                    <td>
                                        @foreach ($j->pengampu->dosen as $dosen)
                                            {{ $dosen->nama }}<br>
                                        @endforeach
                                    </td>
                                    <td>{{ $j->ruang->nama_ruang ?? '-' }}</td>
                                    <td>{{ $j->pengampu->kelas->nama_kelas ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('jadwal.edit', $j->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('jadwal.destroy', $j->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data jadwal kuliah yang tersedia.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div>
                            Menampilkan {{ $jadwalKuliah->firstItem() }} - {{ $jadwalKuliah->lastItem() }} 
                            dari {{ $jadwalKuliah->total() }} data
                        </div>
                        <div>
                            {{ $jadwalKuliah->appends(['search' => $search])->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
