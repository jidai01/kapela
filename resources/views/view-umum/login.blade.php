@include('template/header')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
        <h4 class="bg-dark text-light text-center mb-4 p-2 rounded">Selamat Datang</h4>

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

            <button type="submit" class="btn btn-dark w-100 mb-2"><i class="bi bi-box-arrow-in-right"></i> Login</button>
        </form>

        <a href="/" class="btn btn-outline-secondary w-100"><i class="bi bi-arrow-return-left"></i> Kembali ke Halaman Utama</a>
    </div>
</div>
