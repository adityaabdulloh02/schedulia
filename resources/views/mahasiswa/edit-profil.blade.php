@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Profil Mahasiswa</h1>

    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white py-3">
            <h6 class="m-0 font-weight-bold text-white">Informasi Profil</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('mahasiswa.profil.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $mahasiswa->nama) }}" required disabled>
                    <input type="hidden" name="nama" value="{{ $mahasiswa->nama }}" />
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{ old('nim', $mahasiswa->nim) }}" required disabled>
                    <input type="hidden" name="nim" value="{{ $mahasiswa->nim }}" />
                    @error('nim')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="prodi_id">Program Studi</label>
                    <select class="form-control @error('prodi_id') is-invalid @enderror" id="prodi_id" name="prodi_id" required disabled>
                        <option value="">Pilih Program Studi</option>
                        @foreach($prodis as $prodi)
                            <option value="{{ $prodi->id }}" {{ old('prodi_id', $mahasiswa->prodi_id) == $prodi->id ? 'selected' : '' }}>{{ $prodi->nama_prodi }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="prodi_id" value="{{ $mahasiswa->prodi_id }}" />
                    @error('prodi_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kelas_id">Kelas</label>
                    <select class="form-control @error('kelas_id') is-invalid @enderror" id="kelas_id" name="kelas_id" required disabled>
                        <option value="">Pilih Kelas</option>
                        @foreach($kelases as $kelas)
                            <option value="{{ $kelas->id }}" {{ old('kelas_id', $mahasiswa->kelas_id) == $kelas->id ? 'selected' : '' }}>{{ $kelas->nama_kelas }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="kelas_id" value="{{ $mahasiswa->kelas_id }}" />
                    @error('kelas_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="semester">Semester</label>
                    <input type="number" class="form-control @error('semester') is-invalid @enderror" id="semester" name="semester" value="{{ old('semester', $mahasiswa->semester) }}" required min="1" max="14" disabled>
                    <input type="hidden" name="semester" value="{{ $mahasiswa->semester }}" />
                    @error('semester')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="foto_profil" class="col-md-4 col-form-label text-md-right">Foto Profil</label>
                    <div class="col-md-6">
                        <input type="file" class="form-control-file @error('foto_profil') is-invalid @enderror" id="foto_profil" name="foto_profil">
                        @error('foto_profil')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @if($mahasiswa->foto_profil)
                            <div class="mt-2">
                                <img src="{{ asset('storage/foto_profil/' . $mahasiswa->foto_profil) }}" alt="Foto Profil" class="img-thumbnail" width="150">
                                <div class="form-check mt-2">
                                    <input type="checkbox" class="form-check-input" id="remove_foto_profil" name="remove_foto_profil" value="1">
                                    <label class="form-check-label" for="remove_foto_profil">Hapus Foto Profil</label>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <hr class="mb-4">

                <h5 class="mb-3">Ubah Password</h5>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password Baru</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Konfirmasi Password Baru</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Profil</button>
                <a href="#" onclick="history.back(); return false;" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection