@extends('template/main')

@php
    $hideFooter = true;
@endphp

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Playfair+Display:wght@700&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f4f6fa;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
        }

        .login-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
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

        .btn-login {
            background-color: #212d5a;
            color: #fff;
            font-weight: 600;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background-color: #f4f6fa;
            color: #212d5a;
        }

        .btn-kembali {
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .form-check-label {
            font-size: 0.9rem;
            color: #555;
        }
    </style>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="login-card">
            <div class="login-title">Selamat Datang</div>

            <form method="POST" action="/autentikasi">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="contoh@email.com"
                        required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="password"
                        autocomplete="off" required>
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

                <button type="submit" class="btn btn-login w-100 mb-3">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                </button>
            </form>

            <a href="/" class="btn btn-outline-secondary w-100 btn-kembali">
                <i class="bi bi-arrow-return-left"></i> Kembali ke Halaman Utama
            </a>
        </div>
    </div>
@endsection
