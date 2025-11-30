@extends('layouts.app')

@push('styles')
<link href="{{ asset('css/jadwal.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Jadwal Kuliah</h3>
                    <div class="d-flex align-items-center">
                        @auth
                        @if(Auth::user()->role === 'admin')
                        <a href="{{ route('jadwal.exportPDF') }}" class="btn btn-primary btn-sm me-2">Export PDF</a>
                        @endif
                        @endauth
                        <form action="{{ route('jadwal.generate') }}" method="POST" class="d-inline me-2">
                            @csrf
                            <div class="input-group input-group-sm">
                                <input type="text" name="tahun_akademik" placeholder="Tahun Akademik" required class="form-control">
                                <button type="submit" class="btn btn-primary">Generate Jadwal</button>
                            </div>
                        </form>
                        <a href="{{ route('jadwal.create') }}" class="btn btn-success btn-sm me-2">Tambah Manual</a>
                        <button type="button" class="btn btn-info btn-sm me-2" data-bs-toggle="modal" data-bs-target="#emptySlotsModal" id="showEmptySlotsBtn">
                            List Jadwal Kosong
                        </button>
                        <form action="{{ route('jadwal.index') }}" method="GET" class="d-flex">
                            <div class="input-group input-group-sm">
                                <input type="text" name="search" class="form-control" placeholder="Pencarian..." value="{{ request('search') }}">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('warning'))
                        <div class="alert alert-warning" role="alert">
                            {{ session('warning') }}
                        </div>
                    @endif

                    @if($jadwal->isEmpty())
                        <div class="alert alert-info text-center" role="alert">
                            Belum ada jadwal kuliah yang tersedia.
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="jadwalTable">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="fw-bold text-white">Hari</th>
                                        <th class="fw-bold text-white">Jam</th>
                                        <th class="fw-bold text-white">Mata Kuliah</th>
                                        <th class="fw-bold text-white">Program Studi</th>
                                        <th class="fw-bold text-white">Semester</th>
                                        <th class="fw-bold text-white">Dosen</th>
                                        <th class="fw-bold text-white">Ruang</th>
                                        <th class="fw-bold text-white">Kelas</th>
                                        <th class="fw-bold text-white">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jadwal as $j)
                                    <tr>
                                        <td>{{ $j->hari->nama_hari }}</td>
                                        <td>
                                            {{ Carbon\Carbon::parse($j->jam_mulai)->format('H:i') }} - {{ Carbon\Carbon::parse($j->jam_selesai)->format('H:i') }}
                                            <span class="d-block text-muted small">({{ $j->pengampu->matakuliah->sks * 50 }} menit)</span>
                                        </td>
                                        <td>
                                            {{ $j->pengampu->matakuliah->nama }}
                                            <span class="d-block text-muted small">({{ $j->pengampu->matakuliah->sks }} SKS)</span>
                                        </td>
                                        <td>{{ $j->pengampu->prodi->nama_prodi ?? 'Prodi tidak ditemukan' }}</td>
                                        <td>{{ $j->pengampu->matakuliah->semester }}</td>
                                        <td>
                                            @foreach ($j->pengampu->dosen as $dosen)
                                                <span class="d-block">{{ $dosen->nama }}</span>
                                            @endforeach
                                        </td>
                                        <td>{{ $j->ruang->nama_ruang }}</td>
                                        <td>{{ $j->pengampu->kelas->nama_kelas }}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('jadwal.edit', $j->id) }}" class="btn btn-sm btn-action-edit me-1" data-bs-toggle="tooltip" title="Ubah">
                                                Ubah
                                            </a>
                                            <form action="{{ route('jadwal.destroy', $j->id) }}" method="POST" class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-action-delete" data-bs-toggle="tooltip" title="Hapus">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>


                @if($jadwal->isNotEmpty())
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            Menampilkan {{ $jadwal->firstItem() }} - {{ $jadwal->lastItem() }} 
                            dari {{ $jadwal->total() }} data
                        </div>
                        <nav aria-label="Page navigation">
                            <ul class="pagination mb-0">
                                {{-- Previous Page Link --}}
                                @if ($jadwal->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">Previous</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $jadwal->previousPageUrl() }}">Previous</a>
                                    </li>
                                @endif

                                {{-- Page Numbers --}}
                                @foreach(range(1, $jadwal->lastPage()) as $page)
                                    @if($page == $jadwal->currentPage())
                                        <li class="page-item active">
                                            <span class="page-link">{{ $page }}</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $jadwal->url($page) }}">{{ $page }}</a>
                                        </li>
                                    @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($jadwal->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $jadwal->nextPageUrl() }}">Next</a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <span class="page-link">Next</span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal for Empty Slots -->
<div class="modal fade" id="emptySlotsModal" tabindex="-1" aria-labelledby="emptySlotsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="emptySlotsModalLabel">Jadwal Kosong Tersedia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="emptySlotsContent">
                    <p>Memuat jadwal kosong...</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        const deleteForms = document.querySelectorAll('.delete-form');

        deleteForms.forEach(form => {
            form.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent the default form submission

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda tidak akan dapat mengembalikan ini!",
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
            });
        });

        // Logic for fetching and displaying empty slots
        const showEmptySlotsBtn = document.getElementById('showEmptySlotsBtn');
        const emptySlotsContent = document.getElementById('emptySlotsContent');

        if (showEmptySlotsBtn) {
            showEmptySlotsBtn.addEventListener('click', function () {
                emptySlotsContent.innerHTML = '<p>Memuat jadwal kosong...</p>'; // Reset content

                fetch('{{ route('jadwal.empty-slots') }}')
                    .then(response => response.json())
                    .then(data => {
                        if (data.length > 0) {
                            let tableHtml = `
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead class="table-dark">
                                            <tr>
                                                <th class="fw-bold text-white">Hari</th>
                                                <th class="fw-bold text-white">Jam Mulai</th>
                                                <th class="fw-bold text-white">Jam Selesai</th>
                                                <th class="fw-bold text-white">Ruang</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                            `;
                            data.forEach(slot => {
                                tableHtml += `
                                    <tr>
                                        <td>${slot.hari}</td>
                                        <td>${slot.jam_mulai.substring(0, 5)}</td>
                                        <td>${slot.jam_selesai.substring(0, 5)}</td>
                                        <td>${slot.ruang}</td>
                                    </tr>
                                `;
                            });
                            tableHtml += `
                                        </tbody>
                                    </table>
                                </div>
                            `;
                            emptySlotsContent.innerHTML = tableHtml;
                        } else {
                            emptySlotsContent.innerHTML = '<p>Tidak ada jadwal kosong yang tersedia.</p>';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching empty slots:', error);
                        emptySlotsContent.innerHTML = '<p class="text-danger">Gagal memuat jadwal kosong. Silakan coba lagi.</p>';
                    });
            });
        }
    });
</script>
@endpush