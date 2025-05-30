@extends('template/main')

@php
    $hideFooter = true;
@endphp

@section('menu-navbar')
    @include('template/navbar')
@endsection

@section('content')
    <h2>Daftar Wilayah</h2>
    <a href="/tambah-wilayah" class="btn btn-sm btn-success m-2">Tambah Wilayah</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Wilayah</th>
                <th>Ketua Wilayah</th>
                <th>Jumlah Anggota</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($wilayah as $index => $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->nama_wilayah }}</td>
                    <td>{{ $row->ketua_wilayah }}</td>
                    <td>{{ $row->jumlah_anggota }}</td>
                    <td>
                        <a href="/edit-wilayah/{{ $row->id_wilayah }}" class="btn btn-sm btn-warning">Edit</a> |
                        <a href="/delete-wilayah/{{ $row->id_wilayah }}" class="btn btn-sm btn-danger"
                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data Wilayah.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@include('template/bottom')