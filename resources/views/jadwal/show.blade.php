@extends('layouts.app')

@push('styles')
<link href="{{ asset('css/jadwal.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Detail Jadwal Kuliah</h3>
                    <a href="{{ route('jadwal.index') }}" class="btn btn-primary btn-sm">Kembali</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th class="w-25">Hari</th>
                                <td>{{ $jadwal->hari->nama_hari }}</td>
                            </tr>
                            <tr>
                                <th>Jam</th>
                                <td>
                                    {{ Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}
                                    <span class="d-block text-muted small">({{ $jadwal->pengampu->matakuliah->sks * 50 }} menit)</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Mata Kuliah</th>
                                <td>
                                    {{ $jadwal->pengampu->matakuliah->nama }}
                                    <span class="d-block text-muted small">({{ $jadwal->pengampu->matakuliah->sks }} SKS)</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Program Studi</th>
                                <td>{{ $jadwal->pengampu->prodi->nama_prodi ?? 'Prodi tidak ditemukan' }}</td>
                            </tr>
                            <tr>
                                <th>Semester</th>
                                <td>{{ $jadwal->pengampu->matakuliah->semester }}</td>
                            </tr>
                            <tr>
                                <th>Dosen</th>
                                <td>
                                    @foreach ($jadwal->pengampu->dosen as $dosen)
                                        <span class="d-block">{{ $dosen->nama }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Ruang</th>
                                <td>{{ $jadwal->ruang->nama_ruang }}</td>
                            </tr>
                            <tr>
                                <th>Kelas</th>
                                <td>{{ $jadwal->pengampu->kelas->nama_kelas }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Akademik</th>
                                <td>{{ $jadwal->tahun_akademik }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
