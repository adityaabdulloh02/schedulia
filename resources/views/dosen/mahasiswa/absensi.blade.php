@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Absensi - {{ $mahasiswa->nama }}</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-white">Riwayat Absensi</h6>
        </div>
        <div class="card-body">
            <!-- Filter Form -->
            <div class="mb-4">
                <form action="{{ route('dosen.mahasiswa.absensi', $mahasiswa->id) }}" method="GET" class="form-inline">
                    <div class="form-group mr-2">
                        <label for="matakuliah_id" class="mr-2">Filter Mata Kuliah:</label>
                        <select name="matakuliah_id" id="matakuliah_id" class="form-control">
                            <option value="">Semua Mata Kuliah</option>
                            @foreach($matakuliahList as $matakuliah)
                                <option value="{{ $matakuliah->id }}" {{ (isset($selectedMataKuliahId) && $selectedMataKuliahId == $matakuliah->id) ? 'selected' : '' }}>
                                    {{ $matakuliah->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-filter"></i> Filter
                    </button>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mata Kuliah</th>
                            <th>Tanggal</th>
                            <th>Status Kehadiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($absensi as $item)
                        <tr>
                            <td>{{ $item->jadwalKuliah->pengampu->matakuliah->nama }}</td>
                            <td>{{ $item->created_at->format('d M Y, H:i') }}</td>
                            <td>
                                <span class="badge badge-{{ $item->status == 'Hadir' ? 'success' : 'danger' }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada data absensi.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <a href="{{ route('dosen.mahasiswa.index') }}" class="btn btn-secondary mt-3">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar Mahasiswa
            </a>
        </div>
    </div>
</div>
@endsection
