@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Absensi - {{ $mahasiswa->nama }}</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-white">Riwayat Absensi</h6>
        </div>
        <div class="card-body">
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
