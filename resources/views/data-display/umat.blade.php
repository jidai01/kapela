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

        .btn-info {
            background-color: #0dcaf0;
            border: none;
            font-weight: 500;
        }

        .btn-info:hover {
            background-color: #0bbce8;
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

        .btn-action-group .btn {
            min-width: 85px;
        }

        .table-striped>tbody>tr:nth-of-type(odd) {
            background-color: #f9f9f9;
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
                <a href="/kelola/tambah-umat" class="btn btn-success shadow-sm">
                    <i class="bi bi-plus-circle"></i> Tambah {{ $title }}
                </a>
            </div>

            <div class="card-body bg-light p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped m-0">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 10%">NIK</th>
                                <th style="width: 20%">Nama Lengkap</th>
                                <th style="width: 10%">Tanggal Lahir</th>
                                <th style="width: 10%">Jenis Kelamin</th>
                                <th style="width: 15%">Nama KUB</th>
                                <th style="width: 15%">Nama Wilayah</th>
                                <th style="width: 15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($umat as $index => $row)
                                <tr>
                                    <td>{{ ($umat->currentPage() - 1) * $umat->perPage() + $loop->iteration }}</td>
                                    <td>{{ $row->nik }}</td>
                                    <td>{{ $row->nama_lengkap }}</td>
                                    <td>{{ \Carbon\Carbon::parse($row->tanggal_lahir)->format('d-m-Y') }}</td>
                                    <td>{{ $row->jenis_kelamin }}</td>
                                    <td>{{ $row->kub->nama_kub }}</td>
                                    <td>{{ $row->kub->wilayah->nama_wilayah }}</td>
                                    <td class="d-flex justify-content-center gap-2 btn-action-group">
                                        <a href="/kelola/detail-umat/{{ $row->nik }}"
                                            class="btn btn-sm btn-info text-dark">
                                            <i class="bi bi-arrow-right-circle"></i> Detail
                                        </a>
                                        <a href="/kelola/edit-umat/{{ $row->nik }}"
                                            class="btn btn-sm btn-warning text-dark">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <a href="/kelola/delete-umat/{{ $row->nik }}"
                                            class="btn btn-sm btn-danger text-white"
                                            onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-3">
                                        Tidak ada {{ $title }}.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $umat->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
