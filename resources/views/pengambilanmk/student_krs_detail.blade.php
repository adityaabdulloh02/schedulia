@extends('layouts.app')

@section('title', 'Detail KRS Mahasiswa')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Kartu Rencana Studi (KRS)</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-white">{{ $mahasiswa->nama }} ({{ $mahasiswa->nim }})</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p><strong>Program Studi:</strong> {{ $mahasiswa->prodi->nama_prodi ?? 'N/A' }}</p>
                            <p><strong>Kelas:</strong> {{ $mahasiswa->kelas->nama_kelas ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Semester:</strong> {{ $mahasiswa->semester }}</p>
                            <p><strong>Tahun Akademik:</strong> {{ $pengambilanMKs->first()->tahun_akademik ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kode MK</th>
                                    <th>Mata Kuliah</th>
                                    <th>SKS</th>
                                    <th>Dosen Pengampu</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalSks = 0;
                                @endphp
                                @forelse ($pengambilanMKs as $pengambilan)
                                    @php
                                        if ($pengambilan->matakuliah) {
                                            $totalSks += $pengambilan->matakuliah->sks;
                                        }
                                    @endphp
                                    <tr>
                                        <td>{{ $pengambilan->matakuliah->kode_mk ?? 'N/A' }}</td>
                                        <td>{{ $pengambilan->matakuliah->nama ?? 'N/A' }}</td>
                                        <td>{{ $pengambilan->matakuliah->sks ?? 'N/A' }}</td>
                                        <td>
                                            @if ($pengambilan->pengampu && $pengambilan->pengampu->dosen)
                                                @foreach($pengambilan->pengampu->dosen as $dosen)
                                                    {{ $dosen->nama }}{{ !$loop->last ? ',' : '' }}
                                                @endforeach
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            @if ($pengambilan->status == 'approved')
                                                <span class="badge badge-success">Disetujui</span>
                                            @elseif ($pengambilan->status == 'pending')
                                                <span class="badge badge-warning">Menunggu</span>
                                            @else
                                                <span class="badge badge-danger">Ditolak</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($pengambilan->status == 'pending')
                                                <form action="{{ route('admin.pengambilanmk.validation.updateStatus', $pengambilan->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <input type="hidden" name="status" value="approved">
                                                    <button type="submit" class="btn btn-success btn-sm">
                                                        <i class="fa fa-check"></i> Setuju
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.pengambilanmk.validation.updateStatus', $pengambilan->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <input type="hidden" name="status" value="rejected">
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-times"></i> Tolak
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada mata kuliah yang diambil.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2" class="text-right">Total SKS:</th>
                                    <th>{{ $totalSks }}</th>
                                    <th colspan="3"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="mt-4 d-flex justify-content-end">
                        <form action="{{ route('admin.mahasiswa.krs.approveAll', $mahasiswa->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menyetujui semua mata kuliah yang tertunda untuk mahasiswa ini?');">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check-circle mr-2"></i>Setujui Semua Mata Kuliah Tertunda
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
