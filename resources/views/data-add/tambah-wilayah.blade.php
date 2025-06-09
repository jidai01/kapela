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

            <form action="/kelola/kirim-wilayah" method="post">
                @csrf

                <div class="mb-1">
                    <label class="form-label"><span class="text-danger">*</span><em class="text-muted"> (data wajib diisi)</em></label>
                </div>

                <div class="mb-3">
                    <label for="nama_wilayah" class="form-label">Nama Wilayah<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nama_wilayah" name="nama_wilayah"
                        placeholder="nama wilayah" required>
                </div>

                <div class="mb-3">
                    <label for="ketua_wilayah" class="form-label">Ketua Wilayah</label>
                    <input type="text" class="form-control" id="ketua_wilayah" name="ketua_wilayah"
                        placeholder="nama ketua wilayah">
                </div>

                <div class="mb-3">
                    <label for="jumlah_anggota" class="form-label">Jumlah Anggota</label>
                    <input type="number" class="form-control" id="jumlah_anggota" name="jumlah_anggota"
                        placeholder="jumlah anggota">
                </div>

                <button type="submit" class="btn btn-dark w-100 mb-2"><i class="bi bi-save"></i>
                    {{ $title }}</button>
                <a href="/kelola/data-wilayah" class="btn btn-outline-secondary w-100"><i
                        class="bi bi-arrow-return-left"></i> Kembali</a>
            </form>
        </div>
    </div>
@endsection
