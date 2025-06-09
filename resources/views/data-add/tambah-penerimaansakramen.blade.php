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

            <form action="/kelola/kirim-penerimaan-sakramen" method="post">
                @csrf

                <div class="mb-1">
                    <label class="form-label"><span class="text-danger">*</span><em class="text-muted"> (data wajib diisi)</em></label>
                </div>

                <div class="mb-3">
                    <label for="id_sakramen" class="form-label">Nama Sakramen<span class="text-danger">*</span></label>
                    <select id="id_sakramen" class="form-control" name="id_sakramen" placeholder="-- Pilih Sakramen --">
                        <option value="">-- Pilih Sakramen --</option>
                        @foreach ($sakramenlist as $sakramen)
                            <option value="{{ $sakramen->id_sakramen }}">{{ $sakramen->nama_sakramen }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="nik" class="form-label">Nama Umat<span class="text-danger">*</span></label>
                    <select id="nik" class="form-control" name="nik" placeholder="-- Pilih Umat --">
                        <option value="">-- Pilih Umat --</option>
                        @foreach ($umatlist as $umat)
                            <option value="{{ $umat->nik }}">{{ $umat->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tanggal_penerimaan_sakramen" class="form-label">Tanggal Penerimaan Sakramen<span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="tanggal_penerimaan_sakramen"
                        name="tanggal_penerimaan_sakramen" placeholder="tanggal penerimaan sakramen">
                </div>

                <button type="submit" class="btn btn-dark w-100 mb-2"><i class="bi bi-save"></i>
                    {{ $title }}</button>
                <a href="/kelola/data-penerimaan-sakramen" class="btn btn-outline-secondary w-100"><i
                        class="bi bi-arrow-return-left"></i> Kembali</a>
            </form>
        </div>
    </div>
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
