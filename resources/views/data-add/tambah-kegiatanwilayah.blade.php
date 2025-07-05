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

            {{-- Alert Validasi --}}
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

            <form action="/kelola/kirim-kegiatan-wilayah" method="POST">
                @csrf

                <div class="mb-2">
                    <label class="form-label">
                        <span class="text-danger">*</span>
                        <em class="text-muted"> (data wajib diisi)</em>
                    </label>
                </div>

                <div class="mb-3">
                    <label for="nama_kegiatan_wilayah" class="form-label">Nama Kegiatan Wilayah<span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nama_kegiatan_wilayah" name="nama_kegiatan_wilayah"
                        value="{{ old('nama_kegiatan_wilayah') }}" placeholder="nama kegiatan wilayah" required>
                </div>

                <div class="mb-3">
                    <label for="id_wilayah" class="form-label">Nama Wilayah<span class="text-danger">*</span></label>
                    <select id="id_wilayah" class="form-select" name="id_wilayah" required>
                        <option value="">-- Pilih Wilayah --</option>
                        @foreach ($wilayahlist as $wilayah)
                            <option value="{{ $wilayah->id_wilayah }}"
                                {{ old('id_wilayah') == $wilayah->id_wilayah ? 'selected' : '' }}>
                                {{ $wilayah->nama_wilayah }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi<span class="text-danger">*</span></label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="deskripsi kegiatan">{{ old('deskripsi') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="tanggal_kegiatan" class="form-label">Tanggal Kegiatan<span
                            class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan"
                        value="{{ old('tanggal_kegiatan') }}" required>
                </div>

                <button type="submit" class="btn btn-submit w-100 mb-3">
                    <i class="bi bi-save"></i> {{ $title }}
                </button>
                <a href="/kelola/data-kegiatan-wilayah" class="btn btn-outline-secondary w-100 btn-back">
                    <i class="bi bi-arrow-return-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>

    {{-- Tom Select --}}
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
