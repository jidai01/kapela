<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SANBELLO | {{ $title }}</title>

    <!-- Font Awesome & Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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

    <!-- START NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-secondary pb-0 d-flex flex-column">
        <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-center p-3 px-4" style="min-height: 80px;">
            <img src="{{ asset('storage/img/logo.jpg') }}" alt="logo-sanbello" width="60" height="60"
                class="border border-3 border-white rounded-circle mb-2 mb-md-0 me-md-5">
            <h1 class="text-center m-0 responsive-heading">
                <strong>Kapela St. Agustinus Bello</strong>
            </h1>
        </div>

        <div class="container-fluid border-top border-2 border-dark d-flex justify-content-center">
            <button class="navbar-toggler my-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav d-flex justify-content-center text-center">
                    <li class="nav-item">
                        <a class="nav-link py-1" href="/">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link py-1 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profil
                        </a>
                        <ul class="dropdown-menu p-0 py-1">
                            <li>
                                <a class="dropdown-item d-flex justify-content-center" href="/profil-sejarah">Sejarah</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider m-0">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex justify-content-center" href="/profil-organisasi">Struktur Organisasi</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-1" href="#">Pengumuman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-1" href="#">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-dark text-light nav-link py-1" href="/login">LOGIN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END NAVBAR -->

    <!-- START CONTENT -->
    <main class="flex-grow-1">
        @yield('content')
    </main>
    <!-- END CONTENT -->

    <!-- START FOOTER -->
    <footer class="bg-secondary text-white mt-auto">
        <div class="container-fluid px-5 py-3 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="{{ asset('storage/img/logo.jpg') }}" alt="logo-sanbello" width="40" height="40"
                    class="border border-3 border-white rounded-circle me-2">
                <h6 class="m-0 text-black">Kapela St. Agustinus Bello</h6>
            </div>

            <div class="d-flex flex-column align-items-center">
                <h6 class="mb-2 text-center text-black">Contacts & Socials</h6>
                <div class="d-flex mb-2">
                    <a href="https://wa.me/your-number" target="_blank" class="text-white me-3">
                        <i class="fab fa-whatsapp fa-lg"></i>
                    </a>
                    <a href="mailto:your-email@example.com" class="text-white">
                        <i class="fas fa-envelope fa-lg"></i>
                    </a>
                </div>
                <div class="d-flex">
                    <a href="https://facebook.com/your-page" target="_blank" class="text-white me-3">
                        <i class="fab fa-facebook fa-lg"></i>
                    </a>
                    <a href="https://instagram.com/your-profile" target="_blank" class="text-white">
                        <i class="fab fa-instagram fa-lg"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-dark text-center py-2">
            <small>© 2025 Kapela St. Agustinus Bello</small>
        </div>
    </footer>
    <!-- END FOOTER -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
