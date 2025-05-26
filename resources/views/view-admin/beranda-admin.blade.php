@extends('template/main')
{{-- @extends('main-admin') --}}

@section('menu-navbar')
{{-- @include('menu-beranda') --}}
@endsection

@section('content')
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
@endsection
