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

  <!-- Dependencies -->
  <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

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
      overflow-x: hidden;
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
    #about {
      background: linear-gradient(180deg, #f8faff 0%, #ffffff 100%);
    }

    .about-card {
      transition: all 0.3s ease;
    }

    .about-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    .about-card h4 {
      color: #212529;
    }

    .icon-wrapper {
      transition: all 0.3s ease;
    }

    .about-card:hover .icon-wrapper {
      background-color: var(--bs-primary);
      color: #fff;
    }
  </style>
  <style>
    #gallery {
      background: linear-gradient(180deg, #f9fbff 0%, #ffffff 100%);
    }

    .gallery-card {
      border-radius: 20px;
      cursor: pointer;
      transition: all 0.4s ease;
    }

    .gallery-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
    }

    .gallery-img {
      height: 280px;
      object-fit: cover;
      transition: transform 0.6s ease, filter 0.4s ease;
    }

    .gallery-card:hover .gallery-img {
      transform: scale(1.08);
      filter: brightness(0.8);
    }

    .gallery-overlay {
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.45);
      opacity: 0;
      transition: opacity 0.4s ease;
    }

    .gallery-card:hover .gallery-overlay {
      opacity: 1;
    }

    .gallery-overlay h5 {
      color: #fff;
      font-size: 1.1rem;
      letter-spacing: 0.3px;
    }

    .btn-primary {
      background-color: var(--bs-primary);
      border: none;
      font-weight: 500;
    }

    .btn-primary:hover {
      background-color: #004aad;
    }

    @media (max-width: 768px) {
      .gallery-img {
        height: 220px;
      }
    }
  </style>
  <style>
    #jurusan {
      background: linear-gradient(180deg, #ffffff 0%, #f7f9fc 100%);
    }

    .major-card {
      transition: all 0.4s ease;
    }

    .major-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 18px 40px rgba(0, 0, 0, 0.1);
    }

    .major-card::before {
      content: "";
      position: absolute;
      top: -30%;
      left: -30%;
      width: 160%;
      height: 160%;
      background: radial-gradient(circle at top right, rgba(13, 110, 253, 0.1), transparent 70%);
      transform: rotate(10deg);
      opacity: 0;
      transition: opacity 0.5s ease;
      z-index: 0;
    }

    .major-card:hover::before {
      opacity: 1;
    }

    .icon-wrapper {
      width: 70px;
      height: 70px;
      margin: 0 auto;
      border-radius: 50%;
      background: rgba(13, 110, 253, 0.08);
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background 0.3s ease;
    }

    .major-card:hover .icon-wrapper {
      background: rgba(13, 110, 253, 0.15);
    }

    .major-card h4 {
      color: #212529;
      font-size: 1.15rem;
    }

    .btn-outline-primary {
      border-width: 2px;
      transition: all 0.3s ease;
    }

    .btn-outline-primary:hover {
      background-color: var(--bs-primary);
      color: #fff;
    }

    @media (max-width: 768px) {
      .major-card {
        padding: 1.5rem;
      }
    }
  </style>
  <style>
      /* --- hero background carousel --- */
      #schoolCarousel .carousel-item img {
          object-fit: cover;
          height: 100vh;
          filter: brightness(70%) contrast(1.1);
          transition: transform 10s ease;
      }

      #schoolCarousel .carousel-item.active img {
          transform: scale(1.05);
      }

      /* --- dark overlay --- */
      .hero-overlay {
          background: rgba(0, 0, 0, 0.55);
          backdrop-filter: blur(3px);
      }

      .overlay {
          position: absolute;
          top: 0; left: 0;
          width: 100%; height: 100%;
          background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0,0,0,0.7));
      }

      /* --- text highlight --- */
      .text-highlight {
          background: linear-gradient(90deg, #ffffff, #cddcff);
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;
      }

      /* --- responsive & animation --- */
      .hero-content {
          z-index: 3;
          text-shadow: 0 2px 10px rgba(0, 0, 0, 0.4);
      }

      @media (max-width: 768px) {
          .hero-content h1 {
              font-size: 1.9rem;
          }
          .hero-content p {
              font-size: 1rem;
          }
          .btn-lg {
              padding: 0.6rem 1.2rem;
              font-size: 0.9rem;
          }
      }
  </style>
  <style>
      /* --- hero background --- */
      .hero-section {
          background: linear-gradient(135deg, #0d6efd 0%, #6610f2 100%);
          color: #fff;
          position: relative;
          overflow: hidden;
      }

      .hero-bg {
          background: radial-gradient(circle at top left, rgba(255, 255, 255, 0.12), transparent 60%),
                      radial-gradient(circle at bottom right, rgba(255, 255, 255, 0.1), transparent 70%);
          z-index: 0;
      }

      /* --- heading gradient text --- */
      .text-gradient {
          background: linear-gradient(90deg, #ffffff, #cddcff);
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;
      }

      /* --- hero image animation --- */
      .hero-image-wrapper {
          position: relative;
          display: inline-block;
          transition: transform 0.4s ease;
      }

      .hero-image-wrapper:hover {
          transform: translateY(-5px) scale(1.02);
      }

      .hero-float {
          font-weight: 600;
          font-size: 0.9rem;
          white-space: nowrap;
          animation: floatPulse 3s ease-in-out infinite;
      }

      @keyframes floatPulse {
          0%, 100% { transform: translateY(-5px); }
          50% { transform: translateY(5px); }
      }

      /* --- responsive typography --- */
      @media (max-width: 992px) {
          .hero-section {
              text-align: center;
              padding: 4rem 0;
          }

          .hero-image {
              max-height: 300px;
          }

          .text-gradient {
              background: linear-gradient(90deg, #fff, #ddd);
              -webkit-background-clip: text;
          }
      }
  </style>
  <style>
      /* --- Section Background Accent --- */
      #agenda::before,
      #agenda::after {
          content: "";
          position: absolute;
          border-radius: 50%;
          filter: blur(60px);
          z-index: 0;
      }

      #agenda::before {
          top: -80px;
          left: -80px;
          width: 250px;
          height: 250px;
          background: radial-gradient(circle, #0d6efd2e 0%, transparent 70%);
      }

      #agenda::after {
          bottom: -80px;
          right: -80px;
          width: 250px;
          height: 250px;
          background: radial-gradient(circle, #1987542e 0%, transparent 70%);
      }

      /* --- Card Styling --- */
      .agenda-card {
          position: relative;
          display: flex;
          align-items: flex-start;
          background: #fff;
          border-radius: 1rem;
          box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
          padding: 1.75rem 1.5rem 1.75rem 5.5rem;
          transition: all 0.3s ease;
      }

      .agenda-card:hover {
          transform: translateY(-5px);
          box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
      }

      /* --- Date Badge --- */
      .agenda-date {
          position: absolute;
          left: 1.25rem;
          top: 50%;
          transform: translateY(-50%);
          width: 70px;
          height: 70px;
          border-radius: 0.75rem;
          background: linear-gradient(135deg, #0d6efd, #6610f2);
          color: #fff;
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          text-transform: uppercase;
          box-shadow: 0 5px 15px rgba(13, 110, 253, 0.25);
      }

      .agenda-date .month {
          font-size: 0.8rem;
          font-weight: 600;
          letter-spacing: 0.5px;
          opacity: 0.9;
      }

      .agenda-date .day {
          font-size: 1.7rem;
          font-weight: 700;
          line-height: 1;
      }

      /* --- Typography --- */
      .agenda-content h4 {
          color: #1f1f1f;
          letter-spacing: 0.2px;
      }

      .agenda-content p {
          font-size: 0.97rem;
      }

      /* --- Gradient Badge Variants --- */
      .bg-gradient-success {
          background: linear-gradient(90deg, #198754, #20c997);
          color: #fff !important;
      }

      .bg-gradient-warning {
          background: linear-gradient(90deg, #ffc107, #ffcd39);
          color: #212529 !important;
      }

      .bg-gradient-secondary {
          background: linear-gradient(90deg, #6c757d, #adb5bd);
          color: #fff !important;
      }
  </style>
  <style>
    /* Base navbar */
    #mainNavbar {
      background: rgba(13, 13, 13, 0.35);
      backdrop-filter: blur(10px);
      transition: all 0.4s ease;
      z-index: 1000;
    }

    /* Saat discroll */
    #mainNavbar.scrolled {
      background: #0d6efd !important; /* Biru solid */
      backdrop-filter: blur(20px);
      box-shadow: 0 2px 15px rgba(0,0,0,0.15);
    }

    /* Brand text */
    #mainNavbar .navbar-brand {
      font-size: 1.1rem;
      letter-spacing: 0.5px;
      color: #fff;
      transition: color 0.3s;
    }

    #mainNavbar.scrolled .navbar-brand {
      color: #fff; /* Tetap putih */
    }

    /* Nav links */
    #mainNavbar .nav-link {
      color: #f8f9fa;
      font-weight: 500;
      position: relative;
      transition: all 0.3s ease;
    }

    #mainNavbar .nav-link:hover,
    #mainNavbar .nav-link.active {
      color: #fff;
    }

    /* Garis bawah animasi */
    #mainNavbar .nav-link::after {
      content: "";
      position: absolute;
      bottom: 0;
      left: 10%;
      width: 0%;
      height: 2px;
      background-color: #fff;
      transition: all 0.3s ease;
      border-radius: 2px;
    }

    #mainNavbar .nav-link:hover::after,
    #mainNavbar .nav-link.active::after {
      width: 80%;
    }

    /* Saat discroll ubah warna teks jadi putih */
    #mainNavbar.scrolled .nav-link {
      color: #fff;
    }

    #mainNavbar.scrolled .nav-link:hover,
    #mainNavbar.scrolled .nav-link.active {
      color: #f1f1f1;
    }

    /* Tombol login */
    #mainNavbar .btn-primary {
      background: linear-gradient(90deg, #0d6efd, #6610f2);
      border: none;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    #mainNavbar .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(13,110,253,0.3);
    }

    /* Tombol login saat discroll */
    #mainNavbar.scrolled .btn-primary {
      background: #fff !important;
      color: #0d6efd !important;
      border: 2px solid #fff !important;
    }

    #mainNavbar.scrolled .btn-primary:hover {
      background: #e9ecef !important;
      color: #0b5ed7 !important;
    }

    /* Mobile menu */
    @media (max-width: 992px) {
      #mainNavbar .nav-link {
        color: #212529;
        padding: 0.5rem 0;
      }

      #mainNavbar .navbar-collapse {
        background: rgba(255,255,255,0.95);
        border-radius: 0.5rem;
        padding: 1rem;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        margin-top: 0.5rem;
      }

      #mainNavbar .btn-primary {
        width: 100%;
      }
    }
  </style>
  <style>
    .section-heading {
      font-size: 2rem;
      letter-spacing: 1px;
      position: relative;
      display: inline-block;
    }

    .section-heading::after {
      content: "";
      position: absolute;
      left: 50%;
      bottom: -10px;
      transform: translateX(-50%);
      width: 60px;
      height: 3px;
      background-color: #0d6efd;
      border-radius: 2px;
    }

    .card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 1rem 2rem rgba(0,0,0,0.1);
    }

    .form-control {
      border-radius: 0.75rem;
      border: 1px solid #ddd;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-control:focus {
      border-color: #0d6efd;
      box-shadow: 0 0 0 0.25rem rgba(13,110,253,0.15);
    }

    .btn-primary {
      border-radius: 0.75rem;
      background: linear-gradient(135deg, #0d6efd, #0056d2);
      border: none;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background: linear-gradient(135deg, #0056d2, #003a91);
      transform: scale(1.02);
    }

    @media (max-width: 768px) {
      .section-heading {
        font-size: 1.6rem;
      }
    }
  </style>
  <style>
    .section-heading {
      font-size: 2rem;
      letter-spacing: 1px;
      position: relative;
      display: inline-block;
    }

    .section-heading::after {
      content: "";
      position: absolute;
      left: 50%;
      bottom: -10px;
      transform: translateX(-50%);
      width: 60px;
      height: 3px;
      background-color: #0d6efd;
      border-radius: 2px;
    }

    .map-responsive iframe {
      width: 100%;
      height: 450px;
    }

    @media (max-width: 768px) {
      .section-heading {
        font-size: 1.6rem;
      }
      .map-responsive iframe {
        height: 350px;
      }
    }
  </style>
</head>
<body>

<nav id="mainNavbar" class="navbar navbar-expand-lg navbar-dark fixed-top py-3">
  <div class="container">
    <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
      <img src="{{ asset('assets/logo/logo_smkn_4.png') }}" alt="Logo SMKN 4 Bogor" width="36" height="36" class="me-2">
      <span>SMK NEGERI 4 BOGOR</span>
    </a>

    <button class="navbar-toggler border-0 shadow-none" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
        <li class="nav-item"><a class="nav-link {{ Route::is('landingPage.home') ? "active" : "" }}" href="{{ route('landingPage.home') }}#hero">Beranda</a></li>
        <li class="nav-item"><a class="nav-link {{ Route::is('landingPage.home') ? "active" : "" }}" href="{{ route('landingPage.home') }}#about">Tentang Kami</a></li>
        <li class="nav-item"><a class="nav-link {{ Route::is('landingPage.galleries') ? "active" : "" }}" href="{{ route('landingPage.galleries') }}">Galeri</a></li>
        <li class="nav-item"><a class="nav-link {{ Route::is('landingPage.events') ? "active" : "" }}" href="{{ route('landingPage.events') }}">Agenda</a></li>
        <li class="nav-item"><a class="nav-link {{ Route::is('landingPage.news') ? "active" : "" }}" href="{{ route('landingPage.news') }}">Berita</a></li>
        <li class="nav-item"><a class="nav-link {{ Route::is('landingPage.announcements') ? "active" : "" }}" href="{{ route('landingPage.announcements') }}">Pusat Informasi</a></li>
        <li class="nav-item">
          <a href="{{ route('student.login') }}" class="btn btn-primary rounded-pill px-4 ms-lg-3">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

  @yield('content')

  <!-- ===== Footer ===== -->
  <footer class="footer-custom py-5" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mb-4">
          <h5 class="fw-bold">SMK Negeri 4 Bogor</h5>
          <p>Jl. Raya Tajur, KP. Buntar, Kel. Muarasari, Kec. Bogor Selatan, Kota Bogor, Jawa Barat, 16137</p>
          <p>Email: <a href="mailto:smkn4@smkn4bogor.sch.id">smkn4@smkn4bogor.sch.id</a></p>
          <p>Telepon: <a href="tel:+622517547381">(0251) 7547381</a></p>
        </div>
        <div class="col-lg-4 mb-4">
          <h5 class="fw-bold">Tautan Cepat</h5>
          <ul class="list-unstyled">
            <li><a href="#">Beranda</a></li>
            <li><a href="#about">Tentang Kami</a></li>
            <li><a href="#gallery">Galeri</a></li>
            <li><a href="#achievements">Prestasi</a></li>
            <li><a href="#contact">Kontak</a></li>
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
      <div class="text-center">
        <p class="mb-0">© 2025 SMK NEGERI 4 BOGOR. All Rights Reserved.</p>
      </div>
    </div>
  </footer>

  <!-- ===== Scripts ===== -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

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
  {{-- <script>
    // Efek ubah navbar saat scroll
    document.addEventListener('scroll', () => {
      const navbar = document.getElementById('mainNavbar');
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });
  </script> --}}

  <script>
    // Scroll effect
    window.addEventListener("scroll", function() {
      const navbar = document.getElementById("mainNavbar");
      navbar.classList.toggle("scrolled", window.scrollY > 50);
    });
  </script>
  @yield('scripts')
</body>
</html>
