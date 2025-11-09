@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profil Dosen</h1>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if($dosen->foto_profil)
                        <img src="{{ asset('storage/foto_profil/' . $dosen->foto_profil) }}" alt="Foto Profil" class="img-thumbnail rounded-circle" width="200">
                    @else
                        <img src="{{ asset('images/default-profile.png') }}" alt="Foto Profil" class="img-thumbnail rounded-circle" width="200">
                    @endif
                </div>
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>{{ $dosen->nama }}</td>
                        </tr>
                        <tr>
                            <th>NIP</th>
                            <td>{{ $dosen->nip }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $dosen->email }}</td>
                        </tr>
                        <tr>
                            <th>Program Studi</th>
                            <td>{{ $dosen->prodi->nama_prodi }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-primary">Edit Profil</a>
            @if(Auth::check() && Auth::user()->role == 'dosen')
                <a href="{{ url('/dashboard-dosen') }}" class="btn btn-secondary">Kembali</a>
            @else
                <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
            @endif
        </div>
    </div>
</div>
@endsection
