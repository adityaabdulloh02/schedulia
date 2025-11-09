@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Profil Saya</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.profil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-4">
                @if($mahasiswa->foto_profil)
                    <img src="{{ asset('storage/foto_profil/' . $mahasiswa->foto_profil) }}" alt="Foto Profil" class="img-thumbnail" width="200">
                @else
                    <img src="{{ asset('images/default-profile.png') }}" alt="Foto Profil" class="img-thumbnail" width="200">
                @endif
                <div class="form-group mt-2">
                    <label for="foto_profil">Ganti Foto Profil</label>
                    <input type="file" name="foto_profil" id="foto_profil" class="form-control">
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $mahasiswa->nama) }}" required disabled>
                </div>

                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" name="nim" id="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim) }}" required disabled>
                </div>

                <div class="form-group">
                    <label for="prodi_id">Program Studi</label>
                    <select name="prodi_id" id="prodi_id" class="form-control" required disabled>
                        <option value="">Pilih Program Studi</option>
                        @foreach($prodis as $prodi)
                            <option value="{{ $prodi->id }}" {{ old('prodi_id', $mahasiswa->prodi_id) == $prodi->id ? 'selected' : '' }}>
                                {{ $prodi->nama_prodi }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="kelas_id">Kelas</label>
                    <select name="kelas_id" id="kelas_id" class="form-control" required disabled>
                        <option value="">Pilih Kelas</option>
                        @foreach($kelases as $kelas)
                            <option value="{{ $kelas->id }}" {{ old('kelas_id', $mahasiswa->kelas_id) == $kelas->id ? 'selected' : '' }}>
                                {{ $kelas->nama_kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="semester">Semester</label>
                    <input type="number" name="semester" id="semester" class="form-control" value="{{ old('semester', $mahasiswa->semester) }}" required min="1" max="14" disabled>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="#" onclick="history.back(); return false;" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection