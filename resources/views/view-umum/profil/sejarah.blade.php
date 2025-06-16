@extends('template/main')

@section('menu-navbar')
    @include('template/navbar')
@endsection

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Playfair+Display:wght@700&display=swap');

        .content-section {
            padding: 3rem 1rem;
            background-color: #f8f9fa;
            font-family: 'Montserrat', sans-serif;
        }

        .content-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: #212d5a;
            font-weight: 700;
            border-top: 3px solid #212d5a;
            border-bottom: 3px solid #212d5a;
            padding: 0.75rem 0;
            margin-bottom: 2rem;
            text-align: center;
        }

        .content-paragraph {
            max-width: 850px;
            text-align: justify;
            text-indent: 2em;
            font-size: 1rem;
            color: #333;
            line-height: 1.7;
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        @media (max-width: 768px) {
            .content-paragraph {
                padding: 1.25rem;
            }

            .content-title {
                font-size: 1.4rem;
            }
        }
    </style>

    <div class="container-fluid content-section">
        <div class="content-title">
            {{ $title }}
        </div>
        <div class="d-flex justify-content-center px-2">
            <p class="content-paragraph">
                {{ $content }}
            </p>
        </div>
    </div>
@endsection
