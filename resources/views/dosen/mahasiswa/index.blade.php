@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Daftar Mahasiswa</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Mahasiswa yang Diampu</h6>
        </div>
        <div class="card-body">
            @if($mahasiswa->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Foto Profil</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Prodi</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mahasiswa as $mhs)
                                <tr>
                                    <td>
                                        <img src="{{ $mhs->foto_profil ? asset('storage/foto_profil/' . $mhs->foto_profil) : asset('images/default-profil.svg') }}"
                                             alt="Foto Profil"
                                             style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                                    </td>
                                    <td>{{ $mhs->nim }}</td>
                                    <td>{{ $mhs->nama }}</td>
                                    <td>{{ $mhs->prodi->nama_prodi }}</td>
                                    <td>{{ $mhs->kelas->nama_kelas }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p>Tidak ada mahasiswa yang diampu saat ini.</p>
            @endif
        </div>
    </div>
</div>
@endsection