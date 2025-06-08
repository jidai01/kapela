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
            <div class="card-body bg-dark d-flex justify-content-start m-0">
                <a href="/kelola/tambah-kegiatan-wilayah" class="btn btn-success shadow-sm">
                    <i class="bi bi-plus-circle"></i> Tambah {{ $title }}
                </a>
            </div>
            <div class="card-body bg-light p-0">
                <div class="table-responsive">
                    <table class="table table-bordered m-0">
                        <thead class="table-secondary">
                            <tr>
                                <th class="text-center align-middle">No</th>
                                <th class="text-center align-middle">Nama Kegiatan Wilayah</th>
                                <th class="text-center align-middle">Nama Wilayah</th>
                                <th class="text-center align-middle">Deskripsi</th>
                                <th class="text-center align-middle">Tanggal Kegiatan</th>
                                <th class="text-center align-middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kegiatanwilayah as $index => $row)
                                <tr>
                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                    <td class="text-center align-middle">{{ $row->nama_kegiatan_wilayah }}</td>
                                    <td class="text-center align-middle">{{ $row->wilayah->nama_wilayah }}</td>
                                    <td class="text-center align-middle">{{ $row->deskripsi }}</td>
                                    <td class="text-center align-middle">{{ $row->tanggal_kegiatan }}</td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <a href="/kelola/edit-kegiatan-wilayah/{{ $row->id_kegiatan_wilayah }}"
                                            class="btn btn-sm btn-warning text-dark m-1">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <a href="/kelola/delete-kegiatan-wilayah/{{ $row->id_kegiatan_wilayah }}"
                                            class="btn btn-sm btn-danger text-dark m-1"
                                            onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-3">Tidak ada {{ $title }}.
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
