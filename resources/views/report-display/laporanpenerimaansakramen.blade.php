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

            <div class="card-body bg-dark">
                <form action="" method="GET" class="row g-3">
                    <div class="col-md-6">
                        <label for="tanggal_mulai" class="form-label text-white">Tanggal Mulai</label>
                        <input type="date" class="form-control bg-ligth text-dark" id="tanggal_mulai"
                            name="tanggal_mulai" value="{{ request('tanggal_mulai') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="tanggal_selesai" class="form-label text-white">Tanggal Selesai</label>
                        <input type="date" class="form-control bg-ligth text-dark" id="tanggal_selesai"
                            name="tanggal_selesai" value="{{ request('tanggal_selesai') }}">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary shadow-sm">
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
                                <th class="text-center align-middle">No</th>
                                <th class="text-center align-middle">Nama Umat</th>
                                <th class="text-center align-middle">Sakramen</th>
                                <th class="text-center align-middle">Tanggal Penerimaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($penerimaansakramen as $row)
                                <tr>
                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                    <td class="text-center align-middle">{{ $row->umat->nama_lengkap ?? '-' }}</td>
                                    <td class="text-center align-middle">{{ $row->sakramen->nama_sakramen ?? '-' }}</td>
                                    <td class="text-center align-middle">
                                        {{ \Carbon\Carbon::parse($row->tanggal_penerimaan_sakramen)->format('d-m-Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-3">Tidak ada {{ $title }}.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
