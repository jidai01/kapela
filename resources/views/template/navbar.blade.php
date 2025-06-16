<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Playfair+Display:wght@700&display=swap');

    .navbarstyle {
        background-color: #212d5a;
        font-family: 'Montserrat', sans-serif;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .navbarh1style {
        font-family: "Playfair Display", serif;
        font-weight: 700;
        color: white;
        font-size: 1.75rem;
    }

    .navbarnavlinkstyle {
        color: white !important;
        font-weight: 600;
        transition: color 0.3s ease-in-out;
    }

    .navbarnavlinkstyle:hover {
        color: #b8b8b8 !important;
    }

    .navbardropdownitemstyle {
        color: #212d5a !important;
        font-weight: 600;
        text-align: center;
        transition: background-color 0.3s ease-in-out;
    }

    .navbardropdownitemstyle:hover {
        background-color: #f0f0f0 !important;
    }

    .navbarloginbuttonstyle {
        background-color: #ffffff !important;
        color: #212d5a !important;
        font-weight: 700;
        border-radius: 6px;
        padding: 5px 15px;
        transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
    }

    .navbarloginbuttonstyle:hover {
        background-color: #b8b8b8 !important;
        color: white !important;
    }

    .navbar-toggler-icon {
        filter: invert(100%);
    }

    @media (max-width: 768px) {
        .navbarh1style {
            font-size: 1.4rem;
            text-align: center;
        }
    }
</style>

<nav class="navbarstyle d-flex flex-column navbar navbar-expand-lg">
    {{-- Header --}}
    <div
        class="container-fluid border-bottom border-white border-2 d-flex flex-column flex-md-row align-items-center justify-content-center py-3 px-4">
        <img src="{{ asset('storage/img/logo.png') }}" alt="logo-sanbello" width="60" height="60"
            class="border border-white rounded-circle mb-2 mb-md-0 me-md-4">
        <h1 class="navbarh1style m-0 text-center">Kapela St. Agustinus Bello</h1>
    </div>

    {{-- Menu --}}
    <div class="container-fluid d-flex justify-content-center align-items-center my-2">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav d-flex flex-wrap justify-content-center align-items-center gap-2">
                <li class="nav-item">
                    <a class="navbarnavlinkstyle nav-link text-center" href="/">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="navbarnavlinkstyle nav-link dropdown-toggle text-center" href="/profil" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Profil</a>
                    <ul class="dropdown-menu py-1">
                        <li>
                            <a class="navbardropdownitemstyle dropdown-item" href="/profil/sejarah">Sejarah</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider m-0">
                        </li>
                        <li>
                            <a class="navbardropdownitemstyle dropdown-item" href="/profil/organisasi">Struktur
                                Organisasi</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="navbarnavlinkstyle nav-link text-center" href="/pengumuman">Pengumuman</a>
                </li>
                <li class="nav-item">
                    <a class="navbarnavlinkstyle nav-link text-center" href="/berita">Berita</a>
                </li>
                <li class="nav-item">
                    <a id="login" class="navbarloginbuttonstyle btn text-center" href="/login">LOGIN</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
