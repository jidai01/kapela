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

            <form action="/kelola/update-kub" method="POST">
                @csrf
                <input type="hidden" name="id_kub" value="{{ $kub->id_kub }}">

                <div class="mb-3">
                    <label for="nama_kub" class="form-label">Nama KUB</label>
                    <input type="text" class="form-control" id="nama_kub" name="nama_kub"
                        value="{{ old('nama_kub', $kub->nama_kub) }}" required>
                </div>

                <div class="mb-3">
                    <label for="ketua_kub" class="form-label">Ketua KUB</label>
                    <input type="text" class="form-control" id="ketua_kub" name="ketua_kub"
                        value="{{ old('ketua_kub', $kub->ketua_kub) }}" required>
                </div>

                <div class="mb-3">
                    <label for="id_wilayah" class="form-label">Nama Wilayah</label>
                    <select id="id_wilayah" class="form-control mb-4" name="id_wilayah" placeholder="-- Pilih Wilayah --">
                        <option value="">-- Pilih Wilayah --</option>
                        @foreach ($wilayahlist as $wilayah)
                            <option value="{{ $wilayah->id_wilayah }}" @selected($wilayah->id_wilayah == $kub->id_wilayah)>
                                {{ $wilayah->nama_wilayah }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jumlah_anggota" class="form-label">Jumlah Anggota</label>
                    <input type="text" class="form-control" id="jumlah_anggota" name="jumlah_anggota"
                        value="{{ old('jumlah_anggota', $kub->jumlah_anggota) }}" required>
                </div>

                <button type="submit" class="btn btn-dark w-100 mb-2"><i class="bi bi-save"></i> Simpan Perubahan</button>
                <a href="/kelola/data-wilayah" class="btn btn-outline-secondary w-100"><i
                        class="bi bi-arrow-return-left"></i> Kembali</a>
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
