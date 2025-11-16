<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Log In | SMK NEGERI 4 BOGOR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Yayasan Insan Mandiri" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset("favicon.ico")}}">

    <!-- Layout config Js -->
    <script src="{{ asset("assets/js/layout.js")}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset("assets/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset("assets/css/icons.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset("assets/css/app.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset("assets/css/custom.min.css")}}" rel="stylesheet" type="text/css" />

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            background: linear-gradient(135deg, #00c6ff, #007bff);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
            padding: 3rem 1rem; /* tambahin ini */
        }

        .register-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            width: 100%;
            max-width: 480px;
        }
        .register-card .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
        }
        .register-btn {
            background-color: #007bff;
            color: white;
            border: none;
            transition: 0.3s;
        }
        .register-btn:hover {
            background-color: #0056b3;
        }
        .login-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            width: 100%;
            max-width: 420px;
        }
        .login-card .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
        }
        .login-btn {
            background-color: #007bff;
            color: white;
            border: none;
            transition: 0.3s;
        }
        .login-btn:hover {
            background-color: #0056b3;
        }
    </style>

</head>

<body>

    <!-- auth-page wrapper -->
    @yield('content')
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset("assets/libs/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
</body>

</html>
