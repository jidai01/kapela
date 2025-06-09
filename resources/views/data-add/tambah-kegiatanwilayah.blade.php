@extends('template/main')

@php
    $hideFooter = true;
@endphp

@section('menu-sidebar')
    @include('template/sidebar')
@endsection

@section('content')
    <div class="container d-flex justify-content-center align-items-start mt-5 my-2" style="height: auto !important;">
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

            <form action="/kelola/kirim-kegiatan-wilayah" method="post">
                @csrf

                <div class="mb-3">
                    <label for="nama_kegiatan_wilayah" class="form-label">Nama Kegiatan Wilayah</label>
                    <input type="text" class="form-control" id="nama_kegiatan_wilayah" name="nama_kegiatan_wilayah"
                        placeholder="nama kegiatan wilayah" required>
                </div>

                <div class="mb-3">
                    <label for="id_wilayah" class="form-label">Nama Wilayah</label>
                    <select id="id_wilayah" class="form-control" name="id_wilayah" placeholder="-- Pilih Wilayah --">
                        <option value="">-- Pilih Wilayah --</option>
                        @foreach ($wilayahlist as $wilayah)
                            <option value="{{ $wilayah->id_wilayah }}">{{ $wilayah->nama_wilayah }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="deskripsi"></textarea>
                </div>

                <div class="mb-3">
                    <label for="tanggal_kegiatan" class="form-label">Tanggal Kegiatan</label>
                    <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan"
                        placeholder="tanggal kegiatan">
                </div>

                <button type="submit" class="btn btn-dark w-100 mb-2"><i class="bi bi-save"></i>
                    {{ $title }}</button>
                <a href="/kelola/data-kegiatan-wilayah" class="btn btn-outline-secondary w-100"><i
                        class="bi bi-arrow-return-left"></i>
                    Kembali</a>
            </form>
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
            placeholder: "-- Pilih Wilayah --"
        });
    </script>
@endsection
