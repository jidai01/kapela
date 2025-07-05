<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Playfair+Display:wght@700&display=swap');

    .footerstyle {
        background-color: #212d5a;
        font-family: 'Montserrat', sans-serif;
    }

    .footerh6style1 {
        font-family: "Playfair Display", serif;
        font-weight: 700;
    }

    .footerh6style2 {
        font-family: "Montserrat", sans-serif;
        font-weight: 600;
    }

    .footer-icon a {
        color: white;
        transition: color 0.3s ease, transform 0.3s ease;
    }

    .footer-icon a:hover {
        color: #0d6efd;
        transform: scale(1.1);
    }

    .footer-logo {
        border: 2px solid white;
        border-radius: 50%;
        padding: 2px;
    }

    .footer-bottom {
        background-color: #1a1a2e;
    }
</style>

<footer class="footerstyle text-white mt-auto">
    <div class="container-fluid px-5 py-4 d-flex flex-column flex-md-row justify-content-between align-items-center">
        {{-- Left Logo and Name --}}
        <div class="d-flex align-items-center mb-3 mb-md-0">
            <img src="{{ asset('storage/img/logo.png') }}" alt="logo-sanbello" width="45" height="45"
                class="footer-logo me-3">
            <h6 class="footerh6style1 m-0 text-white">Kapela St. Agustinus Bello</h6>
        </div>

        {{-- Contacts & Socials --}}
        <div class="text-center">
            <h6 class="footerh6style2 mb-2">Contacts & Socials</h6>
            <div class="footer-icon d-flex justify-content-center mb-2 gap-3">
                <a href="https://wa.me/your-number" target="_blank" aria-label="WhatsApp">
                    <i class="fab fa-whatsapp fa-lg"></i>
                </a>
                <a href="mailto:your-email@example.com" aria-label="Email">
                    <i class="fas fa-envelope fa-lg"></i>
                </a>
            </div>
            <div class="footer-icon d-flex justify-content-center gap-3">
                <a href="https://facebook.com/your-page" target="_blank" aria-label="Facebook">
                    <i class="fab fa-facebook fa-lg"></i>
                </a>
                <a href="https://instagram.com/your-profile" target="_blank" aria-label="Instagram">
                    <i class="fab fa-instagram fa-lg"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="footer-bottom text-center py-2">
        <small class="footerh6style2 text-white">&copy; {{ now()->year }} Kapela St. Agustinus Bello</small>
    </div>
</footer>
