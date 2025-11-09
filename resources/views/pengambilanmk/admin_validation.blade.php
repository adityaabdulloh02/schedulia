@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('dashboard.admin') }}" class="btn btn-secondary mb-3">Kembali</a>
    <h1>Validasi Pengambilan Mata Kuliah</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($pendingPengambilanMKs->isEmpty())
        <p>Tidak ada pengambilan mata kuliah yang perlu divalidasi.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Mahasiswa</th>
                    <th>Mata Kuliah</th>
                    <th>Semester</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pendingPengambilanMKs as $pengambilanMK)
                    <tr>
                        <td>
                            <img src="{{ $pengambilanMK->mahasiswa->foto_profil ? asset('storage/foto_profil/' . $pengambilanMK->mahasiswa->foto_profil) : asset('images/default-profil.svg') }}" alt="Foto Profil" class="img-fluid rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                        </td>
                        <td>{{ $pengambilanMK->mahasiswa->nama }} ({{ $pengambilanMK->mahasiswa->nim }})</td>
                        <td>{{ $pengambilanMK->matakuliah->nama }}</td>
                        <td>{{ $pengambilanMK->semester }}</td>
                        <td>
                            @if($pengambilanMK->status == 'approved')
                                <span class="badge bg-success"><i class="bi bi-check-circle-fill me-1"></i><strong>{{ ucfirst('Disetujui') }}</strong></span>
                            @elseif($pengambilanMK->status == 'pending')
                                <span class="badge bg-warning text-dark"><i class="bi bi-clock-fill me-1"></i><strong>{{ ucfirst('Menunggu Persetujuan') }}</strong></span>
                            @else
                                <span class="badge bg-danger"><i class="bi bi-x-circle-fill me-1"></i><strong>{{ ucfirst('Ditolak') }}</strong></span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.pengambilanmk.validation.updateStatus', $pengambilanMK->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <input type="hidden" name="status" value="approved">
                                <button type="submit" class="btn btn-success btn-icon-split btn-sm">
                                    <span class="icon text-white-50">
                                        <i class="bi bi-check-lg"></i>
                                    </span>
                                    <span class="text">Setujui</span>
                                </button>
                            </form>
                            <form action="{{ route('admin.pengambilanmk.validation.updateStatus', $pengambilanMK->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit" class="btn btn-danger btn-icon-split btn-sm">
                                    <span class="icon text-white-50">
                                        <i class="bi bi-x-lg"></i>
                                    </span>
                                    <span class="text">Tolak</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
