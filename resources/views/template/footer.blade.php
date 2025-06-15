<style>
    .footerstyle {
        background-color: #212d5a;
    }

    .footerh6style1 {
        font-family: "Playfair Display", serif;
        font-optical-sizing: auto;
        font-weight: 700;
        font-style: normal;
    }

    .footerh6style2 {
        font-family: "Montserrat", sans-serif;
        font-optical-sizing: auto;
        font-weight: 700;
        font-style: normal;
    }
</style>

<footer class="footerstyle text-white mt-auto">
    <div class="container-fluid px-5 py-3 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="{{ asset('storage/img/logo.png') }}" alt="logo-sanbello" width="40" height="40"
                class="border border-white rounded-circle me-2">
            <h6 class="footerh6style1 m-0 text-white">Kapela St. Agustinus Bello</h6>
        </div>

        <div class="d-flex flex-column align-items-center">
            <h6 class="footerh6style2 mb-2 text-center text-white">Contacts & Socials</h6>
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
        <small class="footerh6style2 text-white">© 2025 Kapela St. Agustinus Bello</small>
    </div>
</footer>