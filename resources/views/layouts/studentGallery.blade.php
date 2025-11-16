<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      @hasSection('title')
        @yield('title') - SMK NEGERI 4 BOGOR
      @else
        SMK NEGERI 4 BOGOR
      @endif
    </title>

    <!-- Sweet Alert css-->
    <link href="{{ @asset("assets/libs/sweetalert2/sweetalert2.min.css") }}" rel="stylesheet" type="text/css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
    :root {
        --primary-color: #004d99;
        --secondary-color: #ffc107;
        --dark-color: #212529;
        --light-color: #f5f6f8;
    }

    body {
        font-family: 'Poppins', sans-serif;
        color: var(--dark-color);
        background-color: var(--light-color);
    }

    /* ===== Navbar ===== */
    .navbar {
        background-color: var(--primary-color);
    }
    .navbar-brand,
    .navbar-nav .nav-link {
        color: #fff !important;
        transition: all 0.3s ease;
    }
    .navbar-nav .nav-link:hover {
        color: var(--secondary-color) !important;
    }

    /* ===== Hero & Carousel ===== */
    .carousel-item img {
        height: 90vh;
        object-fit: cover;
        filter: brightness(60%);
    }
    .carousel-caption h5 {
        font-size: 3rem;
        font-weight: 700;
    }

    /* ===== Section ===== */
    .section-padding {
        padding: 80px 0;
    }
    .section-heading {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--primary-color);
    }

    /* ===== Card ===== */
    .card-custom {
        border: none;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }
    .card-custom:hover {
        transform: translateY(-8px);
    }

    /* ===== Gallery ===== */
    .gallery-item img {
        height: 250px;
        object-fit: cover;
        border-radius: 8px;
        transition: transform 0.3s ease;
    }
    .gallery-item img:hover {
        transform: scale(1.05);
    }

    /* ===== Achievements ===== */
    .achievement-item {
        background-color: var(--light-color);
        padding: 20px;
        border-radius: 8px;
    }

    /* ===== Footer ===== */
    .footer-custom {
        background-color: var(--dark-color);
        color: #fff;
    }
    .footer-custom a {
        color: #fff;
        text-decoration: none;
    }
    .footer-custom a:hover {
        color: var(--secondary-color);
    }

    /* ===== Tabs ===== */
    .gallery-tabs .nav-link {
        border: none;
        background: #f8f9fa;
        color: #444;
        border-radius: 50px;
        padding: 0.6rem 1.4rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        transition: all 0.25s ease-in-out;
        font-size: 0.95rem;
        letter-spacing: 0.2px;
    }
    .gallery-tabs .nav-link:hover {
        background: #e9ecef;
        color: var(--bs-primary);
        transform: translateY(-1px);
    }
    .gallery-tabs .nav-link.active {
        background: var(--bs-primary);
        color: #fff !important;
        box-shadow: 0 4px 10px rgba(0, 77, 153, 0.4);
    }

    /* ===== Instagram Card ===== */
    .instagram-card {
        background: #fff;
        border-radius: 18px;
        transition: all 0.35s ease;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
    }
    .instagram-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.08);
    }
    .gallery-image {
        height: 360px;
        object-fit: cover;
        transition: transform 0.6s ease, filter 0.4s ease;
    }
    .gallery-image:hover {
        transform: scale(1.05);
        filter: brightness(0.95);
    }
    .action-icon {
        color: #555;
        transition: color 0.25s ease, transform 0.25s ease;
    }
    .action-icon:hover {
        color: #e1306c;
        transform: scale(1.15);
    }

    /* ===== Responsive ===== */
    @media (max-width: 768px) {
        .gallery-image { height: 280px; }
        .gallery-tabs { flex-wrap: wrap; gap: 0.5rem !important; }
        .gallery-tabs .nav-link { padding: 0.5rem 1rem; font-size: 0.85rem; }
    }
    </style>
    <style>
    /* Base style */
    #studentNavbar {
        background: rgba(13, 13, 13, 0.35);
        backdrop-filter: blur(10px);
        transition: all 0.4s ease;
        z-index: 1000;
    }

    /* Scroll effect */
    #studentNavbar.scrolled {
        background: #0d6efd !important;
        box-shadow: 0 2px 15px rgba(0,0,0,0.15);
        backdrop-filter: blur(20px);
    }

    /* Brand */
    #studentNavbar .navbar-brand {
        color: #fff;
        font-size: 1.1rem;
        letter-spacing: 0.5px;
        transition: color 0.3s;
    }

    #studentNavbar.scrolled .navbar-brand {
        color: #fff;
    }

    /* Nav link */
    #studentNavbar .nav-link {
        color: #f8f9fa;
        transition: all 0.3s ease;
    }

    #studentNavbar .nav-link:hover {
        color: #fff;
    }

    /* Dropdown menu */
    #studentNavbar .dropdown-menu {
        border: none;
        border-radius: 0.5rem;
        background-color: rgba(255,255,255,0.95);
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }

    #studentNavbar .dropdown-item {
        color: #212529;
        transition: all 0.3s ease;
    }

    #studentNavbar .dropdown-item:hover {
        background-color: #0d6efd;
        color: #fff;
    }

    /* Saat discroll semua teks putih */
    #studentNavbar.scrolled .nav-link,
    #studentNavbar.scrolled .dropdown-toggle {
        color: #fff !important;
    }

    /* Mobile tweaks */
    @media (max-width: 992px) {
        #studentNavbar .navbar-collapse {
        background: rgba(255,255,255,0.95);
        border-radius: 0.5rem;
        padding: 1rem;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        margin-top: 0.5rem;
        }
        #studentNavbar .nav-link {
        color: #212529;
        }
    }
    </style>
    <style>
        /* Bagian atas sambutan */
        #gallery .welcome-banner {
            background: linear-gradient(135deg, #0d6efd, #1a73e8);
            color: #fff;
            padding: 2.5rem 2rem;
            border-radius: 1.25rem;
            box-shadow: 0 10px 30px rgba(13, 110, 253, 0.3);
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        /* Efek glow halus */
        #gallery .welcome-banner::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%);
            animation: floatGlow 6s infinite alternate ease-in-out;
        }

        @keyframes floatGlow {
            0% { transform: translate(0, 0); opacity: 0.8; }
            100% { transform: translate(20px, 20px); opacity: 0.5; }
        }

        /* Teks */
        #gallery .welcome-banner h3 {
            font-weight: 700;
            font-size: 1.75rem;
            letter-spacing: 0.5px;
        }

        #gallery .welcome-banner h5 {
            font-weight: 500;
            opacity: 0.95;
            margin-top: 0.5rem;
        }

        /* Hover efek ringan */
        #gallery .welcome-banner:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(13, 110, 253, 0.4);
        }

        /* Tabs styling biar nyatu */
        .gallery-tabs .nav-link {
            border-radius: 30px !important;
            border: 1px solid #dee2e6;
            color: #0d6efd;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .gallery-tabs .nav-link.active {
            background: linear-gradient(90deg, #0d6efd, #1a73e8);
            color: #fff;
            border: none;
            box-shadow: 0 4px 10px rgba(13,110,253,0.3);
        }

        .gallery-tabs .nav-link:hover {
            background: #0d6efd;
            color: #fff;
        }

        /* Responsif */
        @media (max-width: 768px) {
            #gallery .welcome-banner {
            text-align: center;
            padding: 2rem 1.5rem;
            }

            #gallery .welcome-banner h3 {
            font-size: 1.5rem;
            }

            #gallery .welcome-banner h5 {
            font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <nav id="studentNavbar" class="navbar navbar-expand-lg sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
        <img src="{{ asset('assets/logo/logo_smkn_4.png') }}" alt="Logo SMK NEGERI 4 BOGOR"
            width="30" height="30" class="me-2">
        SMK NEGERI 4 BOGOR
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fw-semibold" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                {{ '@'.auth('student')->user()->name ?? 'Guest' }} 
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                <li>
                <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('student.logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="mdi mdi-logout text-muted fs-16"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('student.logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>
                </li>
            </ul>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    @yield('content')

    <footer class="footer-custom py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="fw-bold">SMK Negeri 4 Bogor</h5>
                    <p>Jl. Raya Tajur, KP. Buntar, Kel. Muarasari, Kec. Kota Bogor Selatan, Kota Bogor, Jawa Barat, 16137</p>
                    <p>Email: <a href="mailto:smkn4@smkn4bogor.sch.id">smkn4@smkn4bogor.sch.id</a></p>
                    <p>Telepon: <a href="tel:+622517547381">(0251) 7547381</a></p>
                </div>

                <div class="col-lg-4 mb-4">
                    <h5 class="fw-bold">Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a class="nav-link" href="{{ route('student.logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                                <span class="align-middle" data-key="t-logout">Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('student.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5 class="fw-bold">Ikuti Kami</h5>
                    <a href="#" class="text-white me-3"><i class="bi bi-facebook fs-4"></i></a>
                    <a href="#" class="text-white me-3"><i class="bi bi-instagram fs-4"></i></a>
                    <a href="#" class="text-white me-3"><i class="bi bi-twitter fs-4"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-youtube fs-4"></i></a>
                </div>
            </div>
            <hr class="text-white-50">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0">© 2025 SMK NEGERI 4 BOGOR. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    <script src="{{ @asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    @if (session('success'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 1500,
            showCloseButton: true
        });
    </script>
    @endif
    <script>
        // Scroll listener
        window.addEventListener("scroll", function() {
            const navbar = document.getElementById("studentNavbar");
            navbar.classList.toggle("scrolled", window.scrollY > 50);
        });
    </script>
    @yield('scripts')
</body>
</html>