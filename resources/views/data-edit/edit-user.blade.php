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

        .form-check-label {
            font-size: 0.9rem;
            color: #555;
        }
    </style>

    <div class="container d-flex justify-content-center align-items-start mt-5 my-2" style="min-height: 100vh;">
        <div class="form-card">
            <div class="form-title">Form {{ $title }}</div>

            {{-- Error Validation --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Session Error --}}
            @if (session('error'))
                <div class="alert alert-danger text-center mt-3 mb-3 rounded">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Session Success --}}
            @if (session('success'))
                <div class="alert alert-success text-center mt-3 mb-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ url('/kelola/update-user') }}" method="POST">
                @csrf

                <div class="mb-2">
                    <label class="form-label"><span class="text-danger">*</span>
                        <em class="text-muted"> (data wajib diisi)</em>
                    </label>
                </div>

                <input type="hidden" name="id_user" value="{{ $user->id_user }}">

                <div class="mb-3">
                    <label for="name" class="form-label">Nama<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name', $user->name) }}" placeholder="nama pengguna" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ old('email', $user->email) }}" placeholder="contoh@email.com" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="password baru (opsional)">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="showPassword"
                            onclick="document.getElementById('password').type = this.checked ? 'text' : 'password'">
                        <label class="form-check-label" for="showPassword">
                            Tampilkan Password
                        </label>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="role" class="form-label">Peran<span class="text-danger">*</span></label>
                    <select class="form-select" id="role" name="role" required>
                        <option value="">-- Pilih Peran --</option>
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="ketua" {{ old('role', $user->role) == 'ketua' ? 'selected' : '' }}>Ketua</option>
                        <option value="humas" {{ old('role', $user->role) == 'humas' ? 'selected' : '' }}>Humas</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-submit w-100 mb-3">
                    <i class="bi bi-save"></i> Simpan Perubahan
                </button>
                <a href="{{ url('/kelola/data-user') }}" class="btn btn-outline-secondary w-100 btn-back">
                    <i class="bi bi-arrow-return-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>

    {{-- TomSelect --}}
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
    <script>
        new TomSelect("#role", {
            create: false,
            placeholder: "-- Pilih Peran --",
            allowEmptyOption: false
        });
    </script>
@endsection
