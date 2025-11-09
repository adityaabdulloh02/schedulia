@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Jadwal Kuliah</h3>
                </div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('jadwal.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="pengampu_id" class="form-label">Pengampu</label>
                            <select name="pengampu_id" id="pengampu_id" class="form-select" required>
                                <option value="">Pilih Pengampu</option>
                                @foreach($pengampus as $pengampu)
                                    <option value="{{ $pengampu->id }}" {{ old('pengampu_id') == $pengampu->id ? 'selected' : '' }}>
                                        {{ $pengampu->matakuliah->nama }} - {{ $pengampu->dosen->implode('nama', ', ') }} - {{ $pengampu->kelas->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tahun_akademik" class="form-label">Tahun Akademik</label>
                            <input type="text" name="tahun_akademik" id="tahun_akademik" class="form-control" value="{{ old('tahun_akademik') }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="hari_id" class="form-label">Hari</label>
                                    <select name="hari_id" id="hari_id" class="form-select" required>
                                        <option value="">Pilih Hari</option>
                                        @foreach($haris as $hari)
                                            <option value="{{ $hari->id }}" {{ old('hari_id') == $hari->id ? 'selected' : '' }}>
                                                {{ $hari->nama_hari }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="jam_id" class="form-label">Jam</label>
                                    <select name="jam_id" id="jam_id" class="form-select" required>
                                        <option value="">Pilih Jam</option>
                                        @foreach($jams as $jam)
                                            <option value="{{ $jam->id }}" {{ old('jam_id') == $jam->id ? 'selected' : '' }}>
                                                {{ $jam->jam_mulai }} - {{ $jam->jam_selesai }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="ruang_id" class="form-label">Ruang</label>
                                    <select name="ruang_id" id="ruang_id" class="form-select" required>
                                        <option value="">Pilih Ruang</option>
                                        @foreach($ruangs as $ruang)
                                            <option value="{{ $ruang->id }}" {{ old('ruang_id') == $ruang->id ? 'selected' : '' }}>
                                                {{ $ruang->nama_ruang }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
