<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>DINSOS</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/flexstart/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/flexstart/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/flexstart/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/flexstart/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/flexstart/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="/flexstart/assets/css/main.css" rel="stylesheet">

    <link rel="stylesheet" href="/notif/dist/css/iziToast.min.css">
    <script src="/notif/dist/js/iziToast.min.js" type="text/javascript"></script>
    <!-- =======================================================
  * Template Name: FlexStart
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Updated: Nov 01 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="/logo/logo-kalsel.png" alt="">
                <h1 class="sitename">Dinas Sosial Prov Kal-Sel</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted flex-md-shrink-0" href="/">Home</a>
            <a class="btn-getstarted flex-md-shrink-0" href="/login">Login</a>

        </div>
    </header>

    <main class="main">
        <section id="contact" class="contact section"
            style="background: url('/flexstart/assets/img/hero-bg.png'); background-size:cover;min-height:100vh">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Daftar Sebagai Penerima BanSos</h2>
                <p>Aplikasi BanSos</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-6">

                        <div class="row gy-4">
                            <div class="col-12">
                                <div class="info-item text-center" data-aos="fade" data-aos-delay="200">

                                    <img src="/logo/login.png" width="70%">
                                </div>
                            </div><!-- End Info Item -->


                        </div>

                    </div>

                    <div class="col-lg-6">
                        <form action="/daftar" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="200" style="border:1px solid silver;">
                            @csrf
                            <div class="row gy-4">
                                <p>Silahkan Isi Form di bawah ini</p>
                                {{-- @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif --}}
                                <div class="col-12">
                                    <input type="text" class="form-control" name="name" placeholder="Nama Lengkap Anda"
                                        required="" autocomplete="new-password" value="{{old('name')}}">
                                    @error('name')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="username" placeholder="username"
                                        required="" autocomplete="new-password" value="{{old('username')}}">
                                    @error('username')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <input type="password" class="form-control" name="password" placeholder="password"
                                        required="" autocomplete="new-password" value="">
                                    @error('password')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <input type="password" class="form-control" name="confirm_password"
                                        placeholder="masukkan password lagi" required="" autocomplete="new-password"
                                        value="">
                                    @error('confirm_password')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="col-12 ">
                                    {{-- <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div> --}}

                                    <button type="submit">Login</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section>

    </main>


    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/flexstart/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="/flexstart/assets/vendor/aos/aos.js"></script>
    <script src="/flexstart/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/flexstart/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/flexstart/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="/flexstart/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/flexstart/assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="/flexstart/assets/js/main.js"></script>

    <script type="text/javascript">
        @include('layouts.notif')
    </script>
</body>

</html>