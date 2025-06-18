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
            color: #343a40;
            font-weight: 600;
        }

        .form-control {
            background-color: #fff;
            border: 1px solid #dee2e6;
            font-weight: 500;
            color: #495057;
        }

        .form-control[readonly],
        .form-control:disabled,
        textarea.form-control {
            background-color: #e9ecef;
            resize: none;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            font-weight: 600;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
            font-weight: 600;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            font-weight: 600;
        }

        .btn i {
            margin-right: 4px;
        }
    </style>

    <div class="container-fluid py-4">
        <div class="card shadow-lg border-0 mt-5">
            <div class="card-header">
                Detail Data Umat
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

            <div class="card-body bg-white">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">NIK</label>
                        <input type="text" class="form-control" readonly value="{{ $umat->nik }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" readonly value="{{ $umat->nama_lengkap }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="text" class="form-control" readonly
                            value="{{ \Carbon\Carbon::parse($umat->tanggal_lahir)->format('d-m-Y') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jenis Kelamin</label>
                        <input type="text" class="form-control" readonly value="{{ $umat->jenis_kelamin }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama KUB</label>
                        <input type="text" class="form-control" readonly value="{{ $umat->kub->nama_kub ?? '-' }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nama Wilayah</label>
                        <input type="text" class="form-control" readonly
                            value="{{ $umat->kub->wilayah->nama_wilayah ?? '-' }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" readonly value="{{ $umat->nomor_telepon }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control" readonly value="{{ $umat->pekerjaan }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control" rows="3" readonly>{{ $umat->alamat }}</textarea>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Status Baptis</label>
                        <input type="text" class="form-control" readonly value="{{ $umat->status_baptis }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Status Komuni</label>
                        <input type="text" class="form-control" readonly value="{{ $umat->status_komuni }}">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label class="form-label">Status Krisma</label>
                        <input type="text" class="form-control" readonly value="{{ $umat->status_krisma }}">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label class="form-label">Status Perkawinan</label>
                        <input type="text" class="form-control" readonly value="{{ $umat->status_nikah }}">
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="/kelola/data-umat" class="btn btn-secondary m-1">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </a>
                    <a href="/kelola/edit-umat/{{ $umat->nik }}" class="btn btn-warning text-dark m-1">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <a href="/kelola/delete-umat/{{ $umat->nik }}" class="btn btn-danger text-white m-1"
                        onclick="return confirm('Yakin ingin menghapus?')">
                        <i class="bi bi-trash"></i> Delete
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
