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
            color: #ffffff;
            font-size: 1.4rem;
            font-weight: 600;
            text-align: center;
        }

        .alert {
            font-size: 0.95rem;
            font-weight: 500;
            border-radius: 0;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
            font-weight: 600;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
            font-weight: 500;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            font-weight: 500;
        }

        .btn-danger:hover {
            background-color: #bd2130;
        }

        .table th {
            background-color: #e8ebf0;
            color: #212529;
            font-weight: 600;
            text-align: center;
            vertical-align: middle;
        }

        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table-striped>tbody>tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }

        .btn-action-group .btn {
            min-width: 85px;
        }
    </style>

    <div class="container-fluid py-4">
        <div class="card shadow-lg border-0 mt-5">
            <div class="card-header">
                Daftar {{ $title }}
            </div>

            @if (session('error'))
                <div class="alert alert-danger text-center mt-3">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success text-center mt-3">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card-body bg-white d-flex justify-content-start py-3 px-4">
                <a href="/kelola/tambah-penerimaan-sakramen" class="btn btn-success shadow-sm">
                    <i class="bi bi-plus-circle"></i> Tambah {{ $title }}
                </a>
            </div>

            <div class="card-body bg-light p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped m-0">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 30%">Nama Sakramen</th>
                                <th style="width: 35%">Nama Umat</th>
                                <th style="width: 15%">Tanggal Penerimaan</th>
                                <th style="width: 15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($penerimaansakramen as $index => $row)
                                <tr>
                                    <td>{{ ($penerimaansakramen->currentPage() - 1) * $penerimaansakramen->perPage() + $loop->iteration }}</td>
                                    <td>{{ $row->sakramen->nama_sakramen }}</td>
                                    <td>{{ $row->umat->nama_lengkap }}</td>
                                    <td>{{ \Carbon\Carbon::parse($row->tanggal_penerimaan_sakramen)->format('d-m-Y') }}</td>
                                    <td class="d-flex justify-content-center gap-2 btn-action-group">
                                        <a href="/kelola/edit-penerimaan-sakramen/{{ $row->id }}"
                                            class="btn btn-sm btn-warning text-dark">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <a href="/kelola/delete-penerimaan-sakramen/{{ $row->id }}"
                                            class="btn btn-sm btn-danger text-white"
                                            onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-3">
                                        Tidak ada {{ $title }}.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $penerimaansakramen->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
