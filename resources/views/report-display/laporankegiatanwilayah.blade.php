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
                    <div class="col-md-4">
                        <label for="id_wilayah" class="form-label text-white">Wilayah</label>
                        <select id="id_wilayah" class="form-select bg-light text-dark" name="id_wilayah">
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
                        <label for="tanggal_mulai" class="form-label text-white">Tanggal Mulai</label>
                        <input type="date" class="form-control bg-light text-dark" id="tanggal_mulai"
                            name="tanggal_mulai" value="{{ request('tanggal_mulai') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="tanggal_selesai" class="form-label text-white">Tanggal Selesai</label>
                        <input type="date" class="form-control bg-light text-dark" id="tanggal_selesai"
                            name="tanggal_selesai" value="{{ request('tanggal_selesai') }}">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary shadow-sm">
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
                                <th class="text-center align-middle">No</th>
                                <th class="text-center align-middle">Nama Kegiatan Wilayah</th>
                                <th class="text-center align-middle">Nama Wilayah</th>
                                <th class="text-center align-middle">Deskripsi</th>
                                <th class="text-center align-middle">Tanggal Kegiatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kegiatanwilayah as $index => $row)
                                <tr>
                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                    <td class="text-center align-middle">{{ $row->nama_kegiatan_wilayah }}</td>
                                    <td class="text-center align-middle">{{ $row->wilayah->nama_wilayah }}</td>
                                    <td class="text-center align-middle">{{ $row->deskripsi }}</td>
                                    <td class="text-center align-middle">
                                        {{ \Carbon\Carbon::parse($row->tanggal_kegiatan)->format('d-m-Y') }}</td>
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
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
    <script>
        new TomSelect("#id_wilayah", {
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            },
            placeholder: "Semua Wilayah"
        });
    </script>
@endsection
