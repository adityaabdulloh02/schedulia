@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profil Mahasiswa</h1>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if($mahasiswa->foto_profil)
                        <img src="{{ asset('storage/foto_profil/' . $mahasiswa->foto_profil) }}" alt="Foto Profil" class="img-thumbnail rounded-circle" width="200">
                    @else
                        <img src="{{ asset('images/default-profile.png') }}" alt="Foto Profil" class="img-thumbnail rounded-circle" width="200">
                    @endif
                </div>
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>{{ $mahasiswa->nama }}</td>
                        </tr>
                        <tr>
                            <th>NIM</th>
                            <td>{{ $mahasiswa->nim }}</td>
                        </tr>
                        <tr>
                            <th>Program Studi</th>
                            <td>{{ $mahasiswa->prodi->nama_prodi }}</td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td>
                                @if($mahasiswa->kelas)
                                    {{ $mahasiswa->kelas->nama_kelas }}
                                @else
                                    <span class="text-muted">Belum ada kelas</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Semester</th>
                            <td>{{ $mahasiswa->semester }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer">
            @if(Auth::check() && Auth::user()->id == $mahasiswa->user_id)
                <a href="{{ route('mahasiswa.profil.edit') }}" class="btn btn-primary">Edit Profil</a>
            @else
                <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-primary">Edit Profil (Admin)</a>
            @endif

            @if(Auth::check() && Auth::user()->role == 'mahasiswa')
                <a href="{{ url('/dashboard-mahasiswa') }}" class="btn btn-secondary">Kembali</a>
            @else
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
            @endif
        </div>
    </div>
</div>
@endsection
