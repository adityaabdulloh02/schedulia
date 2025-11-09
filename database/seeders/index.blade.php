@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row g-4">
        <!-- Judul Tabel -->
        <div class="col-12">
            <h4 class="title-with-underline">Tabel Data User</h4>
        </div>

        <!-- Tombol Tambah Data -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('users.create') }}" class="btn btn-primary">
                + Tambah User
            </a>
        </div>

        <!-- Tabel Data -->
        <div class="col-12">
            @if($users->isEmpty())
                <div class="alert alert-info text-center">
                    Tidak ada data user yang tersedia.
                </div>
            @else
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="fw-bold" style="color: black; background-color: #d9edfc;">No</th>
                            <th class="fw-bold" style="color: black; background-color: #d9edfc;">Nama</th>
                            <th class="fw-bold" style="color: black; background-color: #d9edfc;">Email</th>
                            <th class="fw-bold" style="color: black; background-color: #d9edfc;">Role</th>
                            <th class="fw-bold" style="color: black; background-color: #d9edfc;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucfirst($user->role) }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    {{-- Tombol Edit dan Delete bisa ditambahkan di sini nanti --}}
                                    {{-- <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form> --}}
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection