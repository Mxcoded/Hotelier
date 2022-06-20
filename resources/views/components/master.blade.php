<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Medicio Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('frontend/medico/img/favicon.png" rel="icon') }}">
    <link href="{{ asset('frontend/medico/img/apple-touch-icon.png" rel="apple-touch-icon') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('frontend/medico/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/medico/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/medico/vendor/aos/aos.css" rel="stylesheet') }}">
    <link href="{{ asset('frontend/medico/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/medico/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/medico/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/medico/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/medico/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('frontend/medico/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Medicio - v4.7.0
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    @include('inc.entete');
    <main id="main">

        {{ $slot }}

    </main>
    @include('inc.footer');

    <!-- Vendor JS Files -->
    <script src="{{ asset('frontend/medico/vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('frontend/medico/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('frontend/medico/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/medico/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/medico/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/medico/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('frontend/medico/js/main.js') }}"></script>
</body>

</html>