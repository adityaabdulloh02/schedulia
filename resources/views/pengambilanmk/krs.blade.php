@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary-color: #4e73df;
        --secondary-color: #1cc88a;
        --accent-color: #36b9cc;
        --text-color: #5a5c69;
        --text-light: #858796;
        --bg-light: #f8f9fc;
        --bg-dark: #e4e6ef;
        --card-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        --border-radius: 0.75rem;

        /* Table specific colors */
        --table-header-bg: var(--primary-color);
        --table-header-text: #fff;
        --table-row-hover-bg: #e9ecef;
    }

    body {
        background-color: var(--bg-light);
        font-family: 'Nunito', sans-serif;
    }

    .card {
        border: none;
        border-radius: var(--border-radius);
        box-shadow: var(--card-shadow);
    }

    .card-header {
        background-color: #fff;
        border-bottom: 1px solid var(--bg-dark);
        padding: 1.5rem;
        border-top-left-radius: var(--border-radius);
        border-top-right-radius: var(--border-radius);
    }

    .card-header h3 {
        color: var(--text-color);
        font-weight: 700;
        margin-bottom: 0;
    }

    .btn-success {
        background-color: var(--secondary-color);
        border-color: var(--secondary-color);
        transition: all 0.3s ease;
    }
    .btn-success:hover {
        background-color: #17a673;
        border-color: #17a673;
        transform: translateY(-2px);
    }

    .table thead th {
        background-color: var(--table-header-bg);
        color: var(--table-header-text);
        font-weight: 600;
        vertical-align: middle;
        border-bottom: none;
        padding: 1rem;
    }

    .table tbody tr {
        transition: background-color 0.2s ease;
    }

    .table tbody tr:hover {
        background-color: var(--table-row-hover-bg);
    }

    .table tbody td {
        vertical-align: middle;
        color: var(--text-color);
        padding: 1rem;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: var(--bg-light);
    }

    .empty-state {
        padding: 3rem;
        text-align: center;
        color: var(--text-light);
    }
    .empty-state i {
        font-size: 3rem;
        color: var(--bg-dark);
        margin-bottom: 1rem;
    }
</style>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                    <h3 class="mb-2 mb-md-0"><i class="bi bi-card-list me-2"></i>Kartu Rencana Studi (KRS)</h3>
                    
                    <a href="{{ route('krs.export-pdf') }}" class="btn btn-success mb-2 mb-md-0"><i class="fas fa-file-pdf me-2"></i>Export ke PDF</a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-tag me-2"></i>Kode MK</th>
                                    <th><i class="fas fa-book me-2"></i>Nama Mata Kuliah</th>
                                    <th><i class="fas fa-credit-card me-2"></i>SKS</th>
                                    <th><i class="fas fa-calendar-alt me-2"></i>Semester</th>
                                    <th><i class="fas fa-info-circle me-2"></i>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pengambilanMKs as $pengambilan)
                                <tr>
                                    <td>{{ $pengambilan->matakuliah->kode_mk }}</td>
                                    <td>{{ $pengambilan->matakuliah->nama }}</td>
                                    <td>{{ $pengambilan->matakuliah->sks }}</td>
                                    <td>{{ $pengambilan->matakuliah->semester }}</td>
                                    <td>
                                        @if($pengambilan->status == 'approved')
                                            <span class="badge bg-success"><i class="bi bi-check-circle-fill me-1"></i><strong>{{ ucfirst('Disetujui') }}</strong></span>
                                        @elseif($pengambilan->status == 'pending')
                                            <span class="badge bg-warning text-dark"><i class="bi bi-clock-fill me-1"></i><strong>{{ ucfirst('Menunggu Persetujuan') }}</strong></span>
                                        @else
                                            <span class="badge bg-danger"><i class="bi bi-x-circle-fill me-1"></i><strong>{{ ucfirst('Ditolak') }}</strong></span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="empty-state">
                                        <i class="fas fa-box-open"></i>
                                        <p class="mt-3">Anda belum mengambil mata kuliah apapun.</p>
                                        <p>Silakan hubungi bagian akademik untuk informasi lebih lanjut.</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
