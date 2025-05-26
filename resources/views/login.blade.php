<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-secondary">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
            <h4 class="bg-dark text-light text-center mb-4 p-2 rounded">Selamat Datang</h4>

            <form method="POST" action="/autentikasi">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="contoh@email.com" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="password"
                        required>
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

                <button type="submit" class="btn btn-dark w-100 mb-2">Login</button>
            </form>

            <a href="/" class="btn btn-outline-secondary w-100">← Kembali ke Halaman Utama</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
