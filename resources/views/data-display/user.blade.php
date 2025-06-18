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
            letter-spacing: 0.5px;
        }

        .alert {
            font-size: 0.95rem;
            font-weight: 500;
            margin: 0;
            border-radius: 0;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
            font-weight: 500;
            transition: 0.2s;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            font-weight: 500;
            transition: 0.2s;
        }

        .btn-danger:hover {
            background-color: #bd2130;
        }

        .table thead th {
            background-color: #e8ebf0;
            font-weight: 600;
            color: #212529;
            vertical-align: middle;
            text-align: center;
        }

        .table tbody td {
            vertical-align: middle;
            text-align: center;
        }

        .table-striped > tbody > tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }

        .btn-action-group .btn {
            min-width: 90px;
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
                <a href="/kelola/tambah-user" class="btn btn-success shadow-sm">
                    <i class="bi bi-plus-circle"></i> Tambah {{ $title }}
                </a>
            </div>

            <div class="card-body bg-light p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped m-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>Peran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($user as $index => $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ ucfirst($row->role) }}</td>
                                    <td class="d-flex justify-content-center gap-2 btn-action-group">
                                        <a href="/kelola/edit-user/{{ $row->id_user }}"
                                            class="btn btn-sm btn-warning text-dark">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <a href="/kelola/delete-user/{{ $row->id_user }}"
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
                </div>
            </div>
        </div>
    </div>
@endsection
