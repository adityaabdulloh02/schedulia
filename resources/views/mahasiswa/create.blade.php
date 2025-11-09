@extends('layouts.app') {{-- Sesuaikan dengan layout utama Anda --}}

@section('content')
<div class="container">
    <h1>Tambah Mahasiswa Baru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>

        <div class="form-group">
            <label for="nim">NPM/NIM</label>
            <input type="text" name="nim" id="nim" class="form-control" value="{{ old('nim') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
            <small class="form-text text-muted">Minimal 8 karakter.</small>
        </div>

        <div class="form-group">
            <label for="prodi_id">Program Studi</label>
            <select name="prodi_id" id="prodi_id" class="form-control" required>
                <option value="">Pilih Program Studi</option>
                @foreach($prodis as $prodi)
                    <option value="{{ $prodi->id }}" {{ old('prodi_id') == $prodi->id ? 'selected' : '' }}>
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
            <input type="number" name="semester" id="semester" class="form-control" value="{{ old('semester') }}" required min="1" max="14">
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
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
        const oldKelasId = '{{ old('kelas_id') }}';

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

        // On page load, if a prodi is already selected (e.g., due to validation failure),
        // fetch the corresponding kelas.
        if (prodiSelect.value) {
            fetchKelas(prodiSelect.value);
        }
    });
</script>
@endpush
