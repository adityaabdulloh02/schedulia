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
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline" style="margin-left: 5px;" id="delete-form-{{ $user->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger" onclick="confirmDelete(event, 'delete-form-{{ $user->id }}')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
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

@push('scripts')
<script>
function confirmDelete(event, formId) {
    event.preventDefault(); // Prevent the default form submission
    const form = document.getElementById(formId);

    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data user ini akan dihapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit(); // Submit the form if confirmed
        }
    });
}
</script>
@endpush