@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row g-4">
        <!-- Judul Tabel -->
        <div class="col-12">
            <h4 class="title-with">Data Program Studi</h4>
        </div>
        
        <!-- Tombol Tambah Data dan Search -->
        <div class="d-flex justify-content-between align-items-center">
            <button class="btn btn-primary" onclick="window.location.href='{{ route('prodi.create') }}'">
                + Tambah Data
            </button>

            <form action="{{ route('prodi.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control" placeholder="Pencarian..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary ms-2">Cari</button>
            </form>
        </div>
        
        <!-- Tabel Data -->
        <div class="col-12">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="fw-bold" style="color: black; background-color: #d9edfc;">No</th>
                        <th class="fw-bold" style="color: black; background-color: #d9edfc;">Program Studi</th>
                        <th class="fw-bold" style="color: black; background-color: #d9edfc;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prodi as $index => $d)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $d->nama_prodi }}</td>
                        <td>
                            <a href="{{ route('prodi.edit', $d->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('prodi.destroy', $d->id) }}" method="POST" class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if(session('success'))
        Swal.fire({
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    @endif

    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endpush
