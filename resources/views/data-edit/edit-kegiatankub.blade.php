@extends('template/main')

@php
    $hideFooter = true;
@endphp

@section('menu-sidebar')
    @include('template/sidebar')
@endsection

@section('content')
    <div class="container d-flex justify-content-center align-items-start mt-5 my-2" style="min-height: 100vh;">
        <div class="card shadow p-4" style="width: 100%; max-width: 600px;">
            <h4 class="bg-dark text-light text-center mb-4 p-2 rounded">Form {{ $title }}</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/kelola/update-kegiatan-kub" method="POST">
                @csrf

                <div class="mb-1">
                    <label class="form-label"><span class="text-danger">*</span><em class="text-muted"> (data wajib diisi)</em></label>
                </div>

                <input type="hidden" name="id_kegiatan_kub" value="{{ $kegiatankub->id_kegiatan_kub }}">

                <div class="mb-3">
                    <label for="nama_kegiatan_kub" class="form-label">Nama Kegiatan Kub<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nama_kegiatan_kub" name="nama_kegiatan_kub"
                        value="{{ old('nama_kegiatan_kub', $kegiatankub->nama_kegiatan_kub) }}" required>
                </div>

                <div class="mb-3">
                    <label for="id_kub" class="form-label">Nama Kub<span class="text-danger">*</span></label>
                    <select id="id_kub" class="form-control" name="id_kub">
                        <option value="">-- Pilih Kub --</option>
                        @foreach ($kublist as $kub)
                            <option value="{{ $kub->id_kub }}" @selected($kub->id_kub == $kegiatankub->id_kub)>
                                {{ $kub->nama_kub }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi<span class="text-danger">*</span></label>
                    <textarea class="form-control" cols="50" rows="3" id="deskripsi" name="deskripsi"
                        placeholder="deskripsi">{{ old('deskripsi', $kegiatankub->deskripsi ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="tanggal_kegiatan" class="form-label">Tanggal Kegiatan<span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan"
                        value="{{ old('tanggal_kegiatan', $kegiatankub->tanggal_kegiatan) }}" required>
                </div>

                <button type="submit" class="btn btn-dark w-100 mb-2"><i class="bi bi-save"></i> Simpan Perubahan</button>
                <a href="/kelola/data-kegiatan-kub" class="btn btn-outline-secondary w-100">
                    <i class="bi bi-arrow-return-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
    <script>
        new TomSelect("#id_kub", {
            create: false,
            sortField: { field: "text", direction: "asc" },
            placeholder: "-- Pilih Kub --"
        });
    </script>
@endsection
