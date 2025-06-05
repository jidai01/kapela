@extends('template/main')

@section('menu-navbar')
    @include('template/navbar')
@endsection

@section('content')
{{-- <style>
    p {
        color :black
        font-family: "Patrick Hand", cursive;
  font-weight: 400;
  font-style: normal;
    }
</style> --}}
    <div class="container-fluid p-0 mt-5 mb-5">
        <h4 class="border-top border-bottom border-2 border-dark py-1 m-0 mb-3 text-center">
            {{ $title }}
        </h4>
        <div class="d-flex justify-content-center">
            <p class="px-3 px-md-5" style="max-width: 800px; text-align: justify; text-indent: 2em;">
                {{ $content }}
            </p>
        </div>
    </div>
@endsection
