@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Profil Dosen</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Profil</h6>
        </div>
        <div class="card-body">
            @if($dosen)
                <div class="row">
                    <div class="col-md-4 text-center">
                        @if($dosen->foto_profil)
                            <img src="{{ asset('storage/foto_profil/' . $dosen->foto_profil) }}" alt="Foto Profil" class="img-fluid rounded-circle shadow-sm" style="max-width: 200px; border: 3px solid #fff;">
                        @else
                            <div class="text-center">
                                <p>Tidak ada foto profil.</p>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <dl class="row">
                            <dt class="col-sm-3">NIP</dt>
                            <dd class="col-sm-9">: {{ $dosen->nip }}</dd>

                            <dt class="col-sm-3">Nama</dt>
                            <dd class="col-sm-9">: {{ $dosen->nama }}</dd>

                            <dt class="col-sm-3">Email</dt>
                            <dd class="col-sm-9">: {{ $dosen->email }}</dd>

                            <dt class="col-sm-3">Program Studi</dt>
                            <dd class="col-sm-9">: {{ $dosen->prodi->nama_prodi }}</dd>
                        </dl>
                    </div>
                </div>
            @else
                <p>Data dosen tidak ditemukan.</p>
            @endif
        </div>
    </div>
</div>
@endsection