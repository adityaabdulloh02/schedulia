@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                    <div class="d-flex align-items-center">
                        <h3 class="me-3 text-white">Daftar Mahasiswa</h3>
                        @if ($selectedMatakuliahId && $selectedKelasId)
                            @php
                                $pengampu = \App\Models\Pengampu::whereHas('dosen', function ($query) {
                                    $query->where('dosen.id', Auth::user()->dosen->id);
                                })
                                    ->where('matakuliah_id', $selectedMatakuliahId)
                                    ->where('kelas_id', $selectedKelasId)
                                    ->first();
                            @endphp
                            @if ($pengampu)
                                <a href="{{ route('dosen.absensi.take', $pengampu->id) }}" class="btn btn-success btn-sm ms-3">
                                    <i class="fas fa-clipboard-list"></i> Ambil Absensi
                                </a>
                            @endif
                        @endif
                    </div>
                    <form action="{{ route('dosen.mahasiswa.index') }}" method="GET" class="d-flex">
                        <div class="form-group me-2 mb-0">
                            <select name="matakuliah_id" id="matakuliah_id" class="form-control" onchange="this.form.submit()">
                                <option value="">Semua Mata Kuliah</option>
                                @foreach ($mataKuliahDosen as $mk)
                                    @if ($mk->nama)
                                        <option value="{{ $mk->id }}" {{ $selectedMatakuliahId == $mk->id ? 'selected' : '' }}>
                                            {{ $mk->nama }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group me-2 mb-0">
                            <select name="kelas_id" id="kelas_id" class="form-control" onchange="this.form.submit()">
                                <option value="">Semua Kelas</option>
                                @foreach ($kelasDosen as $kelas)
                                    @if ($kelas->nama_kelas)
                                        <option value="{{ $kelas->id }}" {{ $selectedKelasId == $kelas->id ? 'selected' : '' }}>
                                            {{ $kelas->nama_kelas }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th class="fw-bold" style="color: black; background-color: #d9edfc;">Foto Profil</th>
                                    <th class="fw-bold" style="color: black; background-color: #d9edfc;">NIM</th>
                                    <th class="fw-bold" style="color: black; background-color: #d9edfc;">Nama</th>
                                    <th class="fw-bold" style="color: black; background-color: #d9edfc;">Prodi</th>
                                    <th class="fw-bold" style="color: black; background-color: #d9edfc;">Kelas</th>
                                    <th class="fw-bold" style="color: black; background-color: #d9edfc;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mahasiswa as $mhs)
                                <tr>
                                    <td>
                                        @if ($mhs->foto_profil)
                                            <img src="{{ asset('storage/foto_profil/' . $mhs->foto_profil) }}" alt="Foto Profil" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('images/default-profil.svg') }}" alt="Foto Profil Default" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                        @endif
                                    </td>
                                    <td>{{ $mhs->nim }}</td>
                                    <td>{{ $mhs->nama }}</td>
                                    <td>{{ $mhs->prodi->nama_prodi ?? 'N/A' }}</td>
                                    <td>{{ $mhs->kelas->nama_kelas ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('dosen.mahasiswa.absensi', $mhs->id) }}" class="btn btn-warning btn-sm">Absensi</a>
                                        
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data mahasiswa.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div>
                            Menampilkan {{ $mahasiswa->firstItem() }} - {{ $mahasiswa->lastItem() }} 
                            dari {{ $mahasiswa->total() }} data
                        </div>
                        <div>
                            {{ $mahasiswa->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
