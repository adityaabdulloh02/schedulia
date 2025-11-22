@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Data Dosen</h5>
                    <a href="{{ route('dosen.index') }}" class="btn btn-light btn-sm">
                        Kembali
                    </a>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('dosen.update', $dosen->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-4">
                                @if($dosen->foto_profil)
                                    <img src="{{ asset('storage/foto_profil/' . $dosen->foto_profil) }}" alt="Foto Profil" class="img-thumbnail" width="200">
                                @else
                                    <img src="{{ asset('images/default-profil.svg') }}" alt="Foto Profil" class="img-thumbnail" width="200">
                                @endif
                                <div class="form-group mt-2">
                                    <label for="foto_profil">Ganti Foto Profil</label>
                                    <input type="file" name="foto_profil" id="foto_profil" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $dosen->nama) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="nip" class="form-label">NIP</label>
                                    <input type="text" name="nip" id="nip" class="form-control" value="{{ old('nip', $dosen->nip) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $dosen->email) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="prodi_id" class="form-label">Program Studi</label>
                                    <select name="prodi_id" id="prodi_id" class="form-select" required>
                                        <option value="">Pilih Program Studi</option>
                                        @foreach($prodi as $p)
                                            <option value="{{ $p->id }}" {{ old('prodi_id', $dosen->prodi_id) == $p->id ? 'selected' : '' }}>
                                                {{ $p->nama_prodi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-primary">Update Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
