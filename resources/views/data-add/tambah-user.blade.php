@extends('template/main')

@php
    $hideFooter = true;
@endphp

@section('menu-sidebar')
    @include('template/sidebar')
@endsection

@section('content')
    <div class="container d-flex justify-content-center my-2" style="min-height: 100vh;">
        <div class="card shadow p-4" style="width: 100%; max-width: 600px;">
            <h4 class="bg-dark text-light text-center mb-4 p-2 rounded">Form Tambah Data User</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/kelola/kirim-user" method="post">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="nama pengguna"
                        required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="contoh@email.com"
                        required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="password"
                        required>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="showPassword"
                            onclick="document.getElementById('password').type = this.checked ? 'text' : 'password'">
                        <label class="form-check-label" for="showPassword">
                            Tampilkan Password
                        </label>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="role" class="form-label">Peran</label>
                    <select class="form-select" id="role" name="role" required>
                        <option value="">-- Pilih Peran --</option>
                        <option value="admin">Admin</option>
                        <option value="ketua">Ketua</option>
                        <option value="humas">Humas</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-dark w-100 mb-2">Tambah User</button>
                <a href="/kelola/data-user" class="btn btn-outline-secondary w-100">← Kembali</a>
            </form>
        </div>
    </div>

@endsection
