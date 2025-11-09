@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Daftar Mahasiswa Pengambil KRS</h3>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NIM Mahasiswa</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Mata Kuliah</th>
                                    <th>Tahun Akademik</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($krsMahasiswa as $krs)
                                <tr>
                                    <td>{{ optional($krs->mahasiswa)->nim }}</td>
                                    <td>{{ optional($krs->mahasiswa)->nama }}</td>
                                    <td>{{ optional($krs->matakuliah)->nama }}</td>
                                    <td>{{ $krs->tahun_akademik }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada data KRS mahasiswa.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection