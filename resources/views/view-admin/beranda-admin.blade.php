@extends('template/main')

@php
    $hideFooter = true;
@endphp

@section('menu-sidebar')
    @include('template/sidebar')
@endsection

@section('content')
    <h1>Selamat datang, {{ Auth::user()->name }} ({{ Auth::user()->role }})</h1>
@endsection
