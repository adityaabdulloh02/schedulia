@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Profil Mahasiswa</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
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
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $mahasiswa->nama) }}" required>
                </div>

                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" name="nim" id="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim) }}" required>
                </div>

                <div class="form-group">
                    <label for="prodi_id">Program Studi</label>
                    <select name="prodi_id" id="prodi_id" class="form-control" required>
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
                    <select name="kelas_id" id="kelas_id" class="form-control" required>
                        <option value="">Pilih Kelas</option>
                        {{-- Opsi kelas akan diisi oleh JavaScript --}}
                    </select>
                </div>

                <div class="form-group">
                    <label for="semester">Semester</label>
                    <input type="number" name="semester" id="semester" class="form-control" value="{{ old('semester', $mahasiswa->semester) }}" required min="1" max="14">
                </div>
            </div>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const prodiSelect = document.getElementById('prodi_id');
        const kelasSelect = document.getElementById('kelas_id');
        const oldKelasId = '{{ old('kelas_id', $mahasiswa->kelas_id) }}';

        function fetchKelas(prodiId) {
            // Clear the kelas dropdown
            kelasSelect.innerHTML = '<option value="">Pilih Kelas</option>';

            if (prodiId) {
                fetch(`{{ url('/get-kelas-by-prodi') }}/${prodiId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(kelas => {
                            const option = document.createElement('option');
                            option.value = kelas.id;
                            option.textContent = kelas.nama_kelas;
                            if (oldKelasId == kelas.id) {
                                option.selected = true;
                            }
                            kelasSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching kelas:', error));
            }
        }

        prodiSelect.addEventListener('change', function () {
            fetchKelas(this.value);
        });

        // On page load, if a prodi is already selected (e.g., due to validation failure or editing existing data),
        // fetch the corresponding kelas.
        if (prodiSelect.value) {
            fetchKelas(prodiSelect.value);
        }
    });
</script>
@endpush
