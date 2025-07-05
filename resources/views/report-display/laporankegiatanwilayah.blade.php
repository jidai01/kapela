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
            font-weight: 600;
            color: #fff;
        }

        .form-control,
        .form-select {
            font-weight: 500;
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
            font-weight: 600;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .table th {
            background-color: #e8ebf0;
            color: #212529;
            font-weight: 600;
        }

        .table td,
        .table th {
            text-align: center;
            vertical-align: middle !important;
        }

        .table-responsive {
            border-top: 1px solid #dee2e6;
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

            <div class="card-body bg-dark">
                <form action="" method="GET" class="row g-3">
                    <div class="col-md-4">
                        <label for="id_wilayah" class="form-label">Wilayah</label>
                        <select id="id_wilayah" name="id_wilayah" class="form-select bg-light text-dark">
                            <option value="">Semua Wilayah</option>
                            @foreach ($wilayah as $w)
                                <option value="{{ $w->id_wilayah }}"
                                    {{ request('id_wilayah') == $w->id_wilayah ? 'selected' : '' }}>
                                    {{ $w->nama_wilayah }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" id="tanggal_mulai" name="tanggal_mulai"
                            class="form-control bg-light text-dark" value="{{ request('tanggal_mulai') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                        <input type="date" id="tanggal_selesai" name="tanggal_selesai"
                            class="form-control bg-light text-dark" value="{{ request('tanggal_selesai') }}">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary shadow-sm me-2">
                            <i class="bi bi-filter"></i> Filter
                        </button>
                        <a href="/laporan/cetak-kegiatan-wilayah?{{ http_build_query(request()->all()) }}"
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
                                <th style="width: 5%">No</th>
                                <th style="width: 20%">Nama Kegiatan Wilayah</th>
                                <th style="width: 20%">Nama Wilayah</th>
                                <th style="width: 45%">Deskripsi</th>
                                <th style="width: 10%">Tanggal Kegiatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kegiatanwilayah as $index => $row)
                                <tr>
                                    <td>{{ ($kegiatanwilayah->currentPage() - 1) * $kegiatanwilayah->perPage() + $loop->iteration }}
                                    </td>
                                    <td>{{ $row->nama_kegiatan_wilayah }}</td>
                                    <td>{{ $row->wilayah->nama_wilayah }}</td>
                                    <td>{{ $row->deskripsi }}</td>
                                    <td>{{ \Carbon\Carbon::parse($row->tanggal_kegiatan)->format('d-m-Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-3">Tidak ada {{ $title }}.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $kegiatanwilayah->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tom Select --}}
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <script>
        new TomSelect("#id_wilayah", {
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            },
            placeholder: "Pilih Wilayah"
        });
    </script>
@endsection
