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

            <form action="/kelola/update-penerimaan-sakramen" method="POST">
                @csrf

                <input type="hidden" name="id" value="{{ $penerimaansakramen->id }}">

                <div class="mb-2">
                    <label class="form-label">
                        <span class="text-danger">*</span>
                        <em class="text-muted"> (data wajib diisi)</em>
                    </label>
                </div>

                <div class="mb-3">
                    <label for="id_sakramen" class="form-label">Nama Sakramen<span class="text-danger">*</span></label>
                    <select class="form-select" name="id_sakramen" id="id_sakramen" required>
                        <option value="">-- Pilih Sakramen --</option>
                        @foreach ($sakramenlist as $sakramen)
                            <option value="{{ $sakramen->id_sakramen }}" @selected($sakramen->id_sakramen == $penerimaansakramen->id_sakramen)>
                                {{ $sakramen->nama_sakramen }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="nik" class="form-label">Nama Umat<span class="text-danger">*</span></label>
                    <select class="form-select" name="nik" id="nik" required>
                        <option value="">-- Pilih Umat --</option>
                        @foreach ($umatlist as $umat)
                            <option value="{{ $umat->nik }}" @selected($umat->nik == $penerimaansakramen->nik)>
                                {{ $umat->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tanggal_penerimaan_sakramen" class="form-label">Tanggal Penerimaan Sakramen<span
                            class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="tanggal_penerimaan_sakramen"
                        name="tanggal_penerimaan_sakramen"
                        value="{{ old('tanggal_penerimaan_sakramen', $penerimaansakramen->tanggal_penerimaan_sakramen) }}"
                        required>
                </div>

                <button type="submit" class="btn btn-submit w-100 mb-3">
                    <i class="bi bi-save"></i> Simpan Perubahan
                </button>

                <a href="/kelola/data-penerimaan-sakramen" class="btn btn-outline-secondary w-100 btn-back">
                    <i class="bi bi-arrow-return-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>

    {{-- Tom Select --}}
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
    <script>
        new TomSelect("#id_sakramen", {
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            },
            placeholder: "-- Pilih Sakramen --"
        });

        new TomSelect("#nik", {
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            },
            placeholder: "-- Pilih Umat --"
        });
    </script>
@endsection
