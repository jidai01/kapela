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
            <div class="card-header bg-secondary text-white">
                <h2 class="text-center mb-0">Daftar {{ $title }}</h2>
            </div>
            @if (session('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card-body bg-dark d-flex justify-content-start m-0">
                <a href="/kelola/tambah-umat" class="btn btn-success shadow-sm">
                    <i class="bi bi-plus-circle"></i> Tambah {{ $title }}
                </a>
            </div>
            <div class="card-body bg-light p-0">
                <div class="table-responsive">
                    <table class="table table-bordered m-0">
                        <thead class="table-secondary">
                            <tr>
                                <th class="text-center align-middle">No</th>
                                <th class="text-center align-middle">NIK</th>
                                <th class="text-center align-middle">Nama Lengkap</th>
                                <th class="text-center align-middle">Tanggal Lahir</th>
                                <th class="text-center align-middle">Jenis Kelamin</th>
                                <th class="text-center align-middle">Nama KUB</th>
                                <th class="text-center align-middle">Nama Wilayah</th>
                                <th class="text-center align-middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($umat as $index => $row)
                                <tr>
                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                    <td class="text-center align-middle">{{ $row->nik }}</td>
                                    <td class="text-center align-middle">{{ $row->nama_lengkap }}</td>
                                    <td class="text-center align-middle">
                                        {{ \Carbon\Carbon::parse($row->tanggal_lahir)->format('d-m-Y') }}</td>
                                    <td class="text-center align-middle">{{ $row->jenis_kelamin }}</td>
                                    <td class="text-center align-middle">{{ $row->kub->nama_kub }}</td>
                                    <td class="text-center align-middle">{{ $row->kub->wilayah->nama_wilayah }}</td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <a href="/kelola/detail-umat/{{ $row->nik }}"
                                            class="btn btn-sm btn-info text-dark m-1">
                                            <i class="bi bi-arrow-right-circle"></i> Detail
                                        </a>
                                        <a href="/kelola/edit-umat/{{ $row->nik }}"
                                            class="btn btn-sm btn-warning text-dark m-1">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <a href="/kelola/delete-umat/{{ $row->nik }}"
                                            class="btn btn-sm btn-danger text-dark m-1"
                                            onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="14" class="text-center text-muted py-3">Tidak ada {{ $title }}.
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
