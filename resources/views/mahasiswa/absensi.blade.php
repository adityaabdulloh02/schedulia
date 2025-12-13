@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Riwayat Absensi</h1>

    <!-- Filter Form -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('mahasiswa.absensi') }}" method="GET" class="form-inline">
                <div class="form-group mr-3">
                    <label for="matakuliah_id" class="mr-2">Filter Mata Kuliah:</label>
                    <select name="matakuliah_id" id="matakuliah_id" class="form-control">
                        <option value="">Semua Mata Kuliah</option>
                        @foreach ($allApprovedPengambilanMK as $pengambilan)
                            <option value="{{ $pengambilan->pengampu->matakuliah->id }}"
                                {{ $selectedMataKuliahId == $pengambilan->pengampu->matakuliah->id ? 'selected' : '' }}>
                                {{ $pengambilan->pengampu->matakuliah->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ route('mahasiswa.absensi') }}" class="btn btn-secondary ml-2">Reset</a>
            </form>
        </div>
    </div>

    @forelse ($absensiData as $data)
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white">{{ $data['matakuliah'] }}</h6>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Total Pertemuan:</strong> {{ $data['total_pertemuan'] }}
                    </div>
                    <div class="col-md-4">
                        <strong>Hadir:</strong> {{ $data['hadir'] }}
                    </div>
                    <div class="col-md-4">
                        <strong>Persentase Kehadiran:</strong> {{ number_format($data['persentase'], 2) }}%
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Pertemuan Ke</th>
                                <th>Status</th>
                                <th>Waktu Absen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data['riwayat'] as $riwayat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $riwayat->tanggal }}</td>
                                    <td>{{ $riwayat->pertemuan }}</td>
                                    <td>
                                        <span class="badge badge-{{ $riwayat->status == 'hadir' ? 'success' : 'danger' }}">
                                            {{ $riwayat->status }}
                                        </span>
                                    </td>
                                    <td>{{ $riwayat->waktu_absen }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada riwayat absensi untuk mata kuliah ini.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @empty
        <div class="card shadow mb-4">
            <div class="card-body">
                <p class="text-center">Tidak ada data absensi untuk mata kuliah yang dipilih.</p>
            </div>
        </div>
    @endforelse
</div>
@endsection