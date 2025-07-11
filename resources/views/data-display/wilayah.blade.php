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
        }

        .alert {
            font-size: 0.95rem;
            font-weight: 500;
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
        }

        .table td,
        .table th {
            vertical-align: middle !important;
            text-align: center;
        }

        .table-striped>tbody>tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }

        .action-buttons .btn {
            min-width: 90px;
        }
    </style>

    <div class="container-fluid py-4">
        <div class="card shadow-lg border-0 mt-5">
            <div class="card-header text-center">
                Daftar {{ $title }}
            </div>

            @if (session('error'))
                <div class="alert alert-danger text-center mt-3 mb-0 rounded-0">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success text-center mt-3 mb-0 rounded-0">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card-body bg-white d-flex justify-content-start py-3 px-4">
                <a href="/kelola/tambah-wilayah" class="btn btn-success shadow-sm">
                    <i class="bi bi-plus-circle"></i> Tambah {{ $title }}
                </a>
            </div>

            <div class="card-body bg-light p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped m-0">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 30%">Nama Wilayah</th>
                                <th style="width: 20%">Jumlah Anggota</th>
                                <th style="width: 15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($wilayah as $index => $row)
                                <tr>
                                    <td>{{ ($wilayah->currentPage() - 1) * $wilayah->perPage() + $loop->iteration }}</td>
                                    <td>{{ $row->nama_wilayah }}</td>
                                    <td>{{ $row->jumlah_anggota }}</td>
                                    <td class="d-flex justify-content-center align-items-center gap-2 action-buttons">
                                        <a href="/kelola/edit-wilayah/{{ $row->id_wilayah }}"
                                            class="btn btn-sm btn-warning text-dark">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <a href="/kelola/delete-wilayah/{{ $row->id_wilayah }}"
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
                        {{ $wilayah->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
