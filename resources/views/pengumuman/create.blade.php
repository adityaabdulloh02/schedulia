@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Buat Pengumuman Baru</div>

                <div class="card-body">
                    <h5>Detail Jadwal</h5>
                    <p>
                        <strong>Mata Kuliah:</strong> {{ $jadwalKuliah->pengampu->matakuliah->nama }}<br>
                        <strong>Kelas:</strong> {{ $jadwalKuliah->pengampu->kelas->nama_kelas }}<br>
                        <strong>Hari:</strong> {{ $jadwalKuliah->hari->nama_hari }}<br>
                        <strong>Jam:</strong> {{ $jadwalKuliah->jam->jam_mulai }} - {{ $jadwalKuliah->jam->jam_selesai }}<br>
                        <strong>Ruang:</strong> {{ $jadwalKuliah->ruang->nama_ruang }}
                    </p>
                    <hr>

                    <form action="{{ route('pengumuman.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="jadwal_kuliah_id" value="{{ $jadwalKuliah->id }}">

                        <div class="form-group mb-3">
                            <label for="tipe">Jenis Pengumuman</label>
                            <select class="form-control" id="tipe" name="tipe" required>
                                <option value="informasi">Informasi</option>
                                <option value="perubahan">Perubahan Jadwal</option>
                                <option value="pembatalan">Pembatalan Kelas</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="pesan">Pesan</label>
                            <textarea class="form-control" id="pesan" name="pesan" rows="4" required placeholder="Contoh: Kelas hari ini dibatalkan karena ada rapat mendadak."></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Kirim Pengumuman</button>
                        <a href="{{ route('dosen.dashboard') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
