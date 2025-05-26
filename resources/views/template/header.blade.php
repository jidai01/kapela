<style>
    .navbar-toggler {
        padding: 0.25rem 0.5rem;
        font-size: 0.8rem;
        line-height: 1;
        width: 50px;
        height: 32px;
    }

    .navbar-toggler-icon {
        background-size: 80% 80%;
    }

    .nav-link:hover {
        color: white;
    }

    .dropdown-item:active {
        background-color: black !important;
        color: white !important;
    }

    @media (max-width: 576px) {
        .responsive-heading {
            font-size: 6vw;
        }
    }

    @media (min-width: 992px) {
        .responsive-heading {
            font-size: 5vw;
        }
    }
</style>
</head>

<body class="d-flex flex-column h-100">

    <!-- START HEADER -->
    <nav class="navbar navbar-expand-lg bg-secondary pb-0 d-flex flex-column">
        <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-center p-3 px-4"
            style="min-height: 80px;">
            <img src="{{ asset('storage/img/logo.jpg') }}" alt="logo-sanbello" width="60" height="60"
                class="border border-3 border-white rounded-circle mb-2 mb-md-0 me-md-5">
            <h1 class="text-center m-0 responsive-heading">
                <strong>Kapela St. Agustinus Bello</strong>
            </h1>
        </div>

        <div class="container-fluid border-top border-2 border-dark d-flex justify-content-center">
            <button class="navbar-toggler my-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- START NAVBAR --}}
            @yield('menu-navbar')
            {{-- END NAVBAR --}}
    </nav>
    <!-- END HEADER -->
