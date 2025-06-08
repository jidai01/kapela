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
                <a href="/kelola/tambah-penerimaan-sakramen" class="btn btn-success shadow-sm">
                    <i class="bi bi-plus-circle"></i> Tambah {{ $title }}
                </a>
            </div>
            <div class="card-body bg-light p-0">
                <div class="table-responsive">
                    <table class="table table-bordered m-0">
                        <thead class="table-secondary">
                            <tr>
                                <th class="text-center align-middle">No</th>
                                <th class="text-center align-middle">Nama Sakramen</th>
                                <th class="text-center align-middle">Nama Umat</th>
                                <th class="text-center align-middle">Tanggal Penerimaan Sakramen</th>
                                <th class="text-center align-middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($penerimaansakramen as $index => $row)
                                <tr>
                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                    <td class="text-center align-middle">{{ $row->sakramen->nama_sakramen }}</td>
                                    <td class="text-center align-middle">{{ $row->umat->nama_lengkap }}</td>
                                    <td class="text-center align-middle">{{ $row->tanggal_penerimaan_sakramen }}</td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <a href="/kelola/edit-penerimaan-sakramen/{{ $row->id }}"
                                            class="btn btn-sm btn-warning text-dark m-1">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <a href="/kelola/delete-penerimaan-sakramen/{{ $row->id }}"
                                            class="btn btn-sm btn-danger text-dark m-1"
                                            onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-3">Tidak ada {{ $title }}.
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
