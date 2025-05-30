@include('template/header')

<!-- START CONTENT -->
<main class="flex-grow-1">
    @yield('content')
</main>
<!-- END CONTENT -->

{{-- Tambahkan pengecekan di sini --}}
@if (!isset($hideFooter) || !$hideFooter)
    @include('template/footer')
@endif

@include('template/bottom')