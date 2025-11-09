@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Data Pengampu</h5>
                    <a href="{{ route('pengampu.index') }}" class="btn btn-secondary">
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

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('pengampu.update', $pengampu->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label>Dosen 1</label>
                            <select name="dosen1" id="dosen1_select" class="form-control @error('dosen1') is-invalid @enderror">
                                <option value="">Pilih Dosen 1</option>
                                @foreach($dosens as $dosen)
                                    <option value="{{ $dosen->id }}" 
                                        {{ isset($pengampu->dosen[0]) && $pengampu->dosen[0]->id == $dosen->id ? 'selected' : '' }}>
                                        {{ $dosen->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('dosen1')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Dosen 2 (Opsional)</label>
                            <select name="dosen2" id="dosen2_select" class="form-control @error('dosen2') is-invalid @enderror">
                                <option value="">Pilih Dosen 2</option>
                                @foreach($dosens as $dosen)
                                    <option value="{{ $dosen->id }}"
                                        {{ isset($pengampu->dosen[1]) && $pengampu->dosen[1]->id == $dosen->id ? 'selected' : '' }}>
                                        {{ $dosen->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('dosen2')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        

                        

                        <div class="mb-3">
                            <label>Mata Kuliah</label>
                            <select name="matakuliah_id" class="form-control @error('matakuliah_id') is-invalid @enderror">
                                <option value="">Pilih Mata Kuliah</option>
                                @foreach($matakuliahs as $matakuliah)
                                    <option value="{{ $matakuliah->id }}" 
                                        {{ $pengampu->matakuliah_id == $matakuliah->id ? 'selected' : '' }}>
                                        {{ $matakuliah->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('matakuliah_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Kelas</label>
                            <select name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror">
                                <option value="">Pilih Kelas</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}" 
                                        {{ $pengampu->kelas_id == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kelas_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Program Studi</label>
                            <select name="prodi_id" id="prodi_select" class="form-control @error('prodi_id') is-invalid @enderror" readonly>
                                <option value="">Pilih Program Studi</option>
                                @foreach($prodis as $prodi)
                                    <option value="{{ $prodi->id }}"
                                        {{ $pengampu->prodi_id == $prodi->id ? 'selected' : '' }}>
                                        {{ $prodi->nama_prodi }}
                                    </option>
                                @endforeach
                            </select>
                            @error('prodi_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Tahun Akademik</label>
                            <input type="text" name="tahun_akademik" class="form-control @error('tahun_akademik') is-invalid @enderror" 
                                   value="{{ $pengampu->tahun_akademik }}">
                            @error('tahun_akademik')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                Update Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dosenSelect = document.getElementById('dosen1_select');
        const prodiSelect = document.getElementById('prodi_select');
        const dosensData = @json($dosens); // Pass dosens data from PHP to JavaScript

        function updateProdiField() {
            const selectedDosenId = dosenSelect.value;
            if (selectedDosenId) {
                const selectedDosen = dosensData.find(dosen => dosen.id == selectedDosenId);
                if (selectedDosen && selectedDosen.prodi) {
                    prodiSelect.value = selectedDosen.prodi.id;
                    prodiSelect.setAttribute('readonly', 'readonly');
                    prodiSelect.style.backgroundColor = '#e9ecef'; // Grey out the field
                } else {
                    // If selected dosen has no prodi or prodi data is missing
                    prodiSelect.value = '';
                    prodiSelect.removeAttribute('readonly');
                    prodiSelect.style.backgroundColor = '';
                }
            } else {
                // If "Pilih Dosen 1" is selected
                prodiSelect.value = '';
                prodiSelect.removeAttribute('readonly');
                prodiSelect.style.backgroundColor = '';
            }
        }

        // Initial update in case a dosen is pre-selected (e.g., for editing existing data)
        updateProdiField();

        dosenSelect.addEventListener('change', updateProdiField);
    });
</script>
@endpush
@endsection