@extends('template/main')

@php
    $hideFooter = true;
@endphp

@section('menu-sidebar')
    @include('template/sidebar')
@endsection

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f4f6fa;
        }

        .card-header {
            background-color: #212d5a !important;
            color: #fff;
            font-weight: 600;
            font-size: 1.4rem;
            text-align: center;
        }

        .form-label {
            font-weight: 600;
            color: #fff;
        }

        .form-control,
        .form-select {
            font-weight: 500;
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
            font-weight: 600;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .table th {
            background-color: #e8ebf0;
            color: #212529;
            font-weight: 600;
        }

        .table td,
        .table th {
            text-align: center;
            vertical-align: middle !important;
        }

        .table-responsive {
            border-top: 1px solid #dee2e6;
        }
    </style>

    <div class="container-fluid py-4">
        <div class="card shadow-lg border-0 mt-5">
            <div class="card-header">
                Daftar {{ $title }}
            </div>

            <div class="card-body bg-dark">
                <form action="" method="GET" class="row g-3">
                    <div class="col-md-6">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" id="tanggal_mulai" name="tanggal_mulai"
                            class="form-control bg-light text-dark" value="{{ request('tanggal_mulai') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                        <input type="date" id="tanggal_selesai" name="tanggal_selesai"
                            class="form-control bg-light text-dark" value="{{ request('tanggal_selesai') }}">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary shadow-sm me-2">
                            <i class="bi bi-filter"></i> Filter
                        </button>
                        <a href="/laporan/cetak-penerimaan-sakramen?{{ http_build_query(request()->all()) }}"
                            class="btn btn-success shadow-sm">
                            <i class="bi bi-printer"></i> Cetak {{ $title }}
                        </a>
                    </div>
                </form>
            </div>

            <div class="card-body bg-light p-0">
                <div class="table-responsive">
                    <table class="table table-bordered m-0">
                        <thead class="table-secondary">
                            <tr>
                                <th>No</th>
                                <th>Nama Umat</th>
                                <th>Sakramen</th>
                                <th>Tanggal Penerimaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($penerimaansakramen as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->umat->nama_lengkap ?? '-' }}</td>
                                    <td>{{ $row->sakramen->nama_sakramen ?? '-' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($row->tanggal_penerimaan_sakramen)->format('d-m-Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-3">Tidak ada {{ $title }}.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
