@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Daftar Mahasiswa</h3>
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
                                    <th>Foto Profil</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Prodi</th>
                                    <th>Kelas</th>
                                    <th>Semester</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mahasiswas as $mahasiswa)
                                <tr>
                                    <td>
                                        @if($mahasiswa->foto_profil)
                                            <img src="{{ asset('storage/foto_profil/' . $mahasiswa->foto_profil) }}" alt="Foto Profil" width="50">
                                        @else
                                            <img src="{{ asset('images/default-profil.svg') }}" alt="Foto Profil" width="50">
                                        @endif
                                    </td>
                                    <td>{{ $mahasiswa->nim }}</td>
                                    <td>{{ $mahasiswa->nama }}</td>
                                    <td>{{ optional($mahasiswa->prodi)->nama_prodi }}</td>
                                    <td>{{ optional($mahasiswa->kelas)->nama_kelas }}</td>
                                    <td>{{ $mahasiswa->semester }}</td>
                                    <td>
                                        <a href="{{ route('admin.mahasiswa.krs.show', $mahasiswa->id) }}" class="btn btn-primary btn-sm">Lihat KRS</a>
                                        <a href="{{ route('mahasiswa.show', $mahasiswa->id) }}" class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center">
                        {{ $mahasiswas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
