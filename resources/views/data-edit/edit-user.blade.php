<form action="/kelola/update-user" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $user->id }}">

    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}"
            required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email"
            value="{{ old('email', $user->email) }}" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
        <small class="text-muted">Masukkan ulang password baru</small>
    </div>

    <div class="mb-4">
        <label for="role" class="form-label">Peran</label>
        <select class="form-select" id="role" name="role" required>
            <option value="">-- Pilih Peran --</option>
            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="ketua" {{ old('role', $user->role) == 'ketua' ? 'selected' : '' }}>Ketua</option>
            <option value="humas" {{ old('role', $user->role) == 'humas' ? 'selected' : '' }}>Humas</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
</form>
