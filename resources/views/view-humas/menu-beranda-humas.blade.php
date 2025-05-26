<div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
    <ul class="navbar-nav w-100 d-flex justify-content-evenly align-items-center">

        <!-- Dropdown: Data -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Data
            </a>
            <ul class="dropdown-menu text-center">
                <li><a class="dropdown-item" href="#">Pengumuman</a></li>
                <li><a class="dropdown-item" href="#">Berita</a></li>
            </ul>
        </li>

        <!-- Logout Button -->
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST" class="d-flex align-items-center">
                @csrf
                <button type="submit" class="btn btn-outline-danger text-light my-1">Logout</button>
            </form>
        </li>
    </ul>
</div>
