@extends('template/main')

@php
    $hideFooter = true;
@endphp

@section('menu-sidebar')
    @include('template/sidebar')
@endsection

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Playfair+Display:wght@700&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f4f6fa;
        }

        .form-card {
            width: 100%;
            max-width: 600px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
        }

        .form-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            font-weight: 700;
            color: #212d5a;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .form-label {
            font-weight: 600;
            color: #333;
        }

        .form-control,
        .form-select {
            border-radius: 6px;
        }

        .btn-submit {
            background-color: #212d5a;
            color: #fff;
            font-weight: 600;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #f4f6fa;
            color: #212d5a;
        }

        .btn-back {
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.3s ease;
        }
    </style>

    <div class="container d-flex justify-content-center align-items-start mt-5 my-2" style="min-height: 100vh;">
        <div class="form-card">
            <div class="form-title">Form {{ $title }}</div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Session Alerts --}}
            @if (session('error'))
                <div class="alert alert-danger text-center mt-3 mb-3 rounded">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success text-center mt-3 mb-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form action="/kelola/update-kub" method="POST">
                @csrf

                <input type="hidden" name="id_kub" value="{{ $kub->id_kub }}">

                <div class="mb-2">
                    <label class="form-label">
                        <span class="text-danger">*</span>
                        <em class="text-muted"> (data wajib diisi)</em>
                    </label>
                </div>

                <div class="mb-3">
                    <label for="nama_kub" class="form-label">Nama KUB<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nama_kub" name="nama_kub"
                        value="{{ old('nama_kub', $kub->nama_kub) }}" placeholder="nama KUB" required>
                </div>

                <div class="mb-3">
                    <label for="id_wilayah" class="form-label">Nama Wilayah<span class="text-danger">*</span></label>
                    <select id="id_wilayah" name="id_wilayah" class="form-select">
                        <option value="">-- Pilih Wilayah --</option>
                        @foreach ($wilayahlist as $wilayah)
                            <option value="{{ $wilayah->id_wilayah }}"
                                {{ old('id_wilayah', $kub->id_wilayah) == $wilayah->id_wilayah ? 'selected' : '' }}>
                                {{ $wilayah->nama_wilayah }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="ketua_kub" class="form-label">Ketua KUB</label>
                    @if ($umatlist->count() > 0)
                        <select id="ketua_kub" name="ketua_kub" class="form-select">
                            <option value="">-- Pilih Ketua KUB --</option>
                            @foreach ($umatlist as $umat)
                                <option value="{{ $umat->nama_lengkap }}"
                                    {{ old('ketua_kub', $kub->ketua_kub) == $umat->nama_lengkap ? 'selected' : '' }}>
                                    {{ $umat->nama_lengkap }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <div class="alert alert-warning mt-2 mb-0">
                            Tidak ada umat dalam wilayah ini. Harap tambahkan umat terlebih dahulu untuk memilih ketua KUB.
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-submit w-100 mb-3">
                    <i class="bi bi-save"></i> Simpan Perubahan
                </button>
                <a href="/kelola/data-kub" class="btn btn-outline-secondary w-100 btn-back">
                    <i class="bi bi-arrow-return-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>

    {{-- Tom Select --}}
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new TomSelect("#id_wilayah", {
                create: false,
                sortField: {
                    field: "text",
                    direction: "asc"
                },
                placeholder: "-- Pilih Wilayah --"
            });

            @if (isset($umatlist) && $umatlist->count() > 0)
                new TomSelect("#ketua_kub", {
                    create: false,
                    sortField: {
                        field: "text",
                        direction: "asc"
                    },
                    placeholder: "-- Pilih Ketua KUB --"
                });
            @endif
        });
    </script>
@endsection
