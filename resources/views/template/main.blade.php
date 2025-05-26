@include('template/top')

@include('template/header')

<!-- START CONTENT -->
<main class="flex-grow-1">
    @yield('content')
</main>
<!-- END CONTENT -->

@include('template/footer')

@include('template/bottom')
