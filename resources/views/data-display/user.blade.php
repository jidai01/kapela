@extends('template/main')

@php
    $hideFooter = true;
@endphp

@section('menu-navbar')
    @include('template/navbar')
@endsection

@section('content')
    <h2>Daftar User</h2>
    <a href="/tambah-user" class="btn btn-sm btn-success m-2">Tambah User</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Email</th>
                <th>Peran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($user as $index => $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->role }}</td>
                    <td>
                        <a href="/edit-user/{{ $row->id }}" class="btn btn-sm btn-warning">Edit</a> |
                        <a href="/delete-user/{{ $row->id }}" class="btn btn-sm btn-danger"
                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data User.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@include('template/bottom')
