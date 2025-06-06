@extends('template/main')

@php
    $hideFooter = true;
@endphp

@section('menu-sidebar')
    @include('template/sidebar')
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="card shadow-lg border-0 mt-5">
            <div class="card-header bg-secondary text-white text-center">
                <h2 class="mb-0">Detail Data Umat</h2>
            </div>
            <div class="card-body bg-light">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">NIK</label>
                        <div class="form-control">{{ $umat->nik }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Nama Lengkap</label>
                        <div class="form-control">{{ $umat->nama_lengkap }}</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Tanggal Lahir</label>
                        <div class="form-control">{{ $umat->tanggal_lahir }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Jenis Kelamin</label>
                        <div class="form-control">{{ $umat->jenis_kelamin }}</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Nama KUB</label>
                        <div class="form-control">{{ $umat->kub->nama_kub ?? '-' }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Nama Wilayah</label>
                        <div class="form-control">{{ $umat->kub->wilayah->nama_wilayah ?? '-' }}</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Nomor Telepon</label>
                        <div class="form-control">{{ $umat->nomor_telepon }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Pekerjaan</label>
                        <div class="form-control">{{ $umat->pekerjaan }}</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Alamat</label>
                        <textarea class="form-control">{{ $umat->alamat }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Status Baptis</label>
                        <div class="form-control">{{ $umat->status_baptis }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Status Komuni</label>
                        <div class="form-control">{{ $umat->status_komuni }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Status Krisma</label>
                        <div class="form-control">{{ $umat->status_krisma }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Status Perkawinan</label>
                        <div class="form-control">{{ $umat->status_nikah }}</div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="/kelola/data-umat" class="btn btn-secondary m-1">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </a>
                    <a href="/kelola/edit-umat/{{ $umat->nik }}" class="btn btn-warning text-dark m-1">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <a href="/kelola/delete-umat/{{ $umat->nik }}" class="btn btn-danger text-dark m-1"
                        onclick="return confirm('Yakin ingin menghapus?')">
                        <i class="bi bi-trash"></i> Delete
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
