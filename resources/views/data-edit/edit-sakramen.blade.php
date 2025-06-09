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

            <form action="/kelola/update-sakramen" method="POST">
                @csrf

                <div class="mb-1">
                    <label class="form-label"><span class="text-danger">*</span><em class="text-muted"> (data wajib diisi)</em></label>
                </div>

                <input type="hidden" name="id_sakramen" value="{{ $sakramen->id_sakramen }}">

                <div class="mb-3">
                    <label for="nama_sakramen" class="form-label">Nama Sakramen<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nama_sakramen" name="nama_sakramen"
                        value="{{ old('nama_sakramen', $sakramen->nama_sakramen) }}" required>
                </div>

                <button type="submit" class="btn btn-dark w-100 mb-2"><i class="bi bi-save"></i> Simpan Perubahan</button>
                <a href="/kelola/data-sakramen" class="btn btn-outline-secondary w-100"><i
                        class="bi bi-arrow-return-left"></i> Kembali</a>
            </form>
        </div>
    </div>
@endsection
