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

            <form action="/kelola/update-umat" method="POST">
                @csrf

                <div class="mb-1">
                    <label class="form-label"><span class="text-danger">*</span><em class="text-muted"> (data wajib diisi)</em></label>
                </div>

                <input type="hidden" name="nik_lama" value="{{ $umat->nik }}">

                <div class="mb-3">
                    <label for="nik" class="form-label">NIK<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nik" name="nik"
                        value="{{ old('nik', $umat->nik) }}" placeholder="NIK" required>
                </div>

                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                        value="{{ old('nama_lengkap', $umat->nama_lengkap) }}" placeholder="nama lengkap" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                        value="{{ old('tanggal_lahir', $umat->tanggal_lahir) }}">
                </div>

                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin<span class="text-danger">*</span></label>
                    <select class="form-control mb-4" name="jenis_kelamin" id="jenis_kelamin">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="L" @selected(old('jenis_kelamin', $umat->jenis_kelamin ?? '') == 'L')>Laki-laki</option>
                        <option value="P" @selected(old('jenis_kelamin', $umat->jenis_kelamin ?? '') == 'P')>Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" cols="50" rows="3" id="alamat" name="alamat" placeholder="alamat">{{ old('alamat', $umat->alamat ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon"
                        value="{{ old('nomor_telepon', $umat->nomor_telepon) }}" placeholder="nomor telepon">
                </div>

                <div class="mb-3">
                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                        value="{{ old('pekerjaan', $umat->pekerjaan) }}" placeholder="pekerjaan">
                </div>

                <div class="mb-3">
                    <label for="id_kub" class="form-label">Nama KUB<span class="text-danger">*</span></label>
                    <select id="id_kub" class="form-control mb-4" name="id_kub">
                        <option value="">-- Pilih KUB --</option>
                        @foreach ($kublist as $kub)
                            <option value="{{ $kub->id_kub }}" @selected($kub->id_kub == $umat->id_kub)>
                                {{ $kub->nama_kub }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-dark w-100 mb-2"><i class="bi bi-save"></i> Simpan Perubahan</button>
                <a href="/kelola/data-umat" class="btn btn-outline-secondary w-100"><i class="bi bi-arrow-return-left"></i>
                    Kembali</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
    <script>
        new TomSelect("#id_kub", {
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            },
            placeholder: "-- Pilih KUB --"
        });

        new TomSelect("#jenis_kelamin", {
            create: false,
            placeholder: "-- Pilih Jenis Kelamin --",
            allowEmptyOption: true
        });
    </script>
@endsection
