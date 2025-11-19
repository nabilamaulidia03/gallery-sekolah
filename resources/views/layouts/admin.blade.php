<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | SMK NEGERI 4 BOGOR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="SMK NEGERI 4 BOGOR" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">  

    @yield('css')

    <!-- Sweet Alert css-->
    <link href="{{ @asset("assets/libs/sweetalert2/sweetalert2.min.css") }}" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="{{ @asset("assets/libs/swiper/swiper-bundle.min.css") }}" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{ @asset("assets/js/layout.js") }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ @asset("assets/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ @asset("assets/css/icons.min.css") }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- App Css-->
    <link href="{{ @asset("assets/css/app.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ @asset("assets/css/custom.min.css") }}" rel="stylesheet" type="text/css" />


</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ @asset("assets/logo/logo_smkn_4.png") }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <h2 class="p-2 text-white fw-bold">SMK NEGERI 4 BOGOR</h2>
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ @asset("assets/images/logo-sm.png") }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <h2 class="p-2 text-white fw-bold">SMK NEGERI 4 BOGOR</h2>
                                </span>
                            </a>
                        </div>
                        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger shadow-none" id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <i class="bi bi-person-circle fs-3"></i>
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Auth::user()->name }}</span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome {{Auth::user()->name}}</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                                    <span class="align-middle" data-key="t-logout">Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ @asset("assets/logo/logo_smkn_4.png") }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ @asset("assets/images/logo-dark.png") }}" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ @asset("assets/logo/logo_smkn_4.png") }}" alt="" height="32">
                    </span>
                    <span class="logo-lg">
                        <h2 class="p-2 text-white fw-bold">SMK NEGERI 4 BOGOR</h2>
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu Utama</span></li>

                        <!-- Dashboard -->
                        <li class="menu-item">
                            <a class="nav-link {{ Nav::isRoute('admin.home') }}" href="{{ route('admin.home') }}">
                                <i class="mdi mdi-speedometer"></i>
                                <span>Dasbor</span>
                            </a>
                        </li>

                        <li class="menu-title"><span data-key="t-menu">Konten Website</span></li>

                        <li class="menu-item">
                            <a class="nav-link {{ Nav::isResource('abouts') }}" href="{{ route('admin.abouts.index') }}">
                                <i class="mdi mdi-information-outline"></i>
                                <span>Tentang Kami</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a class="nav-link {{ Nav::isResource('carousels') }}" href="{{ route('admin.carousels.index') }}">
                                <i class="mdi mdi-image-multiple"></i>
                                <span>Slider</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a class="nav-link {{ Nav::isResource('gallery-categories') }}" href="{{ route('admin.gallery-categories.index') }}">
                                <i class="mdi mdi-folder-multiple-image"></i>
                                <span>Kategori Galeri</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a class="nav-link {{ Nav::isResource('galleries') }}" href="{{ route('admin.galleries.index') }}">
                                <i class="mdi mdi-folder-multiple-image"></i>
                                <span>Galeri</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a class="nav-link {{ Nav::isResource('study-programs') }}" href="{{ route('admin.study-programs.index') }}">
                                <i class="mdi mdi-book-open-page-variant"></i>
                                <span>Program Studi</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a class="nav-link {{ Nav::isResource('events') }}" href="{{ route('admin.events.index') }}">
                                <i class="mdi mdi-calendar"></i>
                                <span>Kegiatan</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a class="nav-link {{ Nav::isResource('news') }}" href="{{ route('admin.news.index') }}">
                                <i class="mdi mdi-newspaper"></i>
                                <span>Berita</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a class="nav-link {{ Nav::isResource('announcements') }}" href="{{ route('admin.announcements.index') }}">
                                <i class="mdi mdi-bullhorn"></i>
                                <span>Pusat Informasi</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a class="nav-link {{ Nav::isResource('messages') }}" href="{{ route('admin.messages.index') }}">
                                <i class="mdi mdi-email-outline"></i>
                                <span>Pesan</span>
                            </a>
                        </li>

                        @role('super-admin')
                        <li class="menu-title"><span data-key="t-menu">Konten Website</span></li>
                        <li class="menu-item">
                            <a class="nav-link {{ Nav::isResource('users') }}" href="{{ route('admin.users.index') }}">
                                <i class="mdi mdi-account-multiple-outline"></i>
                                <span>Manajemen Pengguna</span>
                            </a>
                        </li>
                        @endrole
                    </ul>


                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="h-100">
                                <div class="row mb-3 pb-1">
                                    <div class="col-12">
                                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                            <div class="flex-grow-1">
                                                <h4 class="fs-16 mb-1">@yield("title", 'Hello!')</h4>
                                                <p class="text-muted mb-0">@yield("sub-title")</p>
                                            </div>
                                            <div class="mt-3 mt-lg-0">
                                                <nav aria-label="breadcrumb">
                                                    <ol class="breadcrumb">
                                                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                                                        @foreach (generateBreadcrumbs() as $key => $breadcrumb)
                                                            @if ($loop->last)
                                                                <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb['name'] }}</li>
                                                            @else
                                                                <li class="breadcrumb-item"><a href="{{ url($breadcrumb['url']) }}">{{ $breadcrumb['name'] }}</a></li>
                                                            @endif
                                                        @endforeach
                                                    </ol>
                                                </nav>
                                            </div>
                                        </div><!-- end card header -->
                                    </div>
                                    <!--end col-->
                                </div>
                                @yield("page-content")
                            </div> <!-- end .h-100-->
                        </div> <!-- end col -->
                    </div>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © NabilaMaulidia.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by NabilaMaulidia with <i class="mdi mdi-heart text-danger"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ @asset("assets/libs/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ @asset("assets/libs/simplebar/simplebar.min.js") }}"></script>
    <script src="{{ @asset("assets/libs/node-waves/waves.min.js") }}"></script>
    <script src="{{ @asset("assets/libs/feather-icons/feather.min.js") }}"></script>
    <script src="{{ @asset("assets/js/pages/plugins/lord-icon-2.1.0.js") }}"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const needToast = document.querySelector("[toast-list]");
            const needChoices = document.querySelector("[data-choices]");
            const needFlatpickr = document.querySelector("[data-provider]");

            function loadScript(src) {
                const s = document.createElement('script');
                s.src = src;
                s.type = 'text/javascript';
                s.defer = true;
                document.head.appendChild(s);
            }

            if (needToast) {
                loadScript('https://cdn.jsdelivr.net/npm/toastify-js');
            }

            if (needChoices) {
                loadScript('{{ @asset("assets/libs/choices.js/public/assets/scripts/choices.min.js") }}');
            }

            if (needFlatpickr) {
                loadScript('{{ @asset("assets/libs/flatpickr/flatpickr.min.js") }}');
            }
        });
    </script>

    <!-- Sweet Alerts js -->
    <script src="{{ @asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    @yield('js')

    <!-- App js -->
    <script src="{{ @asset("assets/js/app.js") }}"></script>
</body>

</html>