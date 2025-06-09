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

            <form action="/kelola/update-kegiatan-wilayah" method="POST">
                @csrf
                <input type="hidden" name="id_kegiatan_wilayah" value="{{ $kegiatanwilayah->id_kegiatan_wilayah }}">

                <div class="mb-3">
                    <label for="nama_kegiatan_wilayah" class="form-label">Nama Kegiatan Wilayah</label>
                    <input type="text" class="form-control" id="nama_kegiatan_wilayah" name="nama_kegiatan_wilayah"
                        value="{{ old('nama_kegiatan_wilayah', $kegiatanwilayah->nama_kegiatan_wilayah) }}" required>
                </div>

                <div class="mb-3">
                    <label for="id_wilayah" class="form-label">Nama Wilayah</label>
                    <select id="id_wilayah" class="form-control mb-4" name="id_wilayah" placeholder="-- Pilih Wilayah --">
                        <option value="">-- Pilih Wilayah --</option>
                        @foreach ($wilayahlist as $wilayah)
                            <option value="{{ $wilayah->id_wilayah }}" @selected($wilayah->id_wilayah == $kegiatanwilayah->id_wilayah)>
                                {{ $wilayah->nama_wilayah }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" cols="50" rows="3" id="deskripsi" name="deskripsi"
                        placeholder="deskripsi">{{ old('deskripsi', $kegiatanwilayah->deskripsi ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="tanggal_kegiatan" class="form-label">Tanggal Kegiatan</label>
                    <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan"
                        value="{{ old('tanggal_kegiatan', $kegiatanwilayah->tanggal_kegiatan) }}" required>
                </div>

                <button type="submit" class="btn btn-dark w-100 mb-2"><i class="bi bi-save"></i> Simpan Perubahan</button>
                <a href="/kelola/data-kegiatan-wilayah" class="btn btn-outline-secondary w-100"><i class="bi bi-arrow-return-left"></i> Kembali</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
    <script>
        new TomSelect("#id_wilayah", {
            create: false,
            sortField: { field: "text", direction: "asc" },
            placeholder: "-- Pilih Wilayah --"
        });
    </script>
@endsection
