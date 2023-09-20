<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Magang')</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
        crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
        integrity="sha384-lKoE+yfuT3KKpKBeIKtCs2CMY5p4IlC+OGw5FJ02zYbbs5q5jv4/wn9Fnp/JqJKS"
        crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kadwa&family=Rubik&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
  <!-- Header -->
  <header class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand mr-5 mb-1 d-flex align-items-center" href="{{ route('home') }}" style="padding-left: 80px">
            <img src="{{ asset('/img/akebonologo.png') }}" class="logo" width="190" alt="" loading="lazy">
            <!-- <img src="https://www.akebono-astra.co.id/akebono/assets/img/sublogo.png" class="sublogo" alt="" /> -->
        </a> <!-- Pindahkan logo ke sebelah kiri -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse order-lg-1" id="navMenu">
            <ul class="navbar-nav mx-auto text-center ml-auto"> <!-- Tambahkan class ml-auto untuk menu -->
                <li class="nav-item"> <a href="" class="nav-link px-3 py-3 text-uppercase text-dark">Home</a></li>
                <li class="nav-item"> <a href="{{ route('home') }}" class="nav-link px-3 py-3 text-uppercase text-dark">Magang</a></li>
                <li class="nav-item"> <a href="" class="nav-link px-3 py-3 text-uppercase text-dark">Contact</a></li>
                <li class="nav-item border-0"> <a href="" class="nav-link px-3 py-3 text-uppercase text-dark">About Us</a></li>
            </ul>
        </div>
    </nav>
</header>
<div class="container" style="margin-top: 100px;"> <!-- Adjust the margin-top value to provide the desired spacing -->
    @yield('content')
</div>
    <section class="contact mt-5 py-3" style="background: #FFFFFF; box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.2);">
        <div class="container">
            <div class="row">
                <div class="title mb-3">
                    <h2 class="font-weight-bolder pl-3">
                        Contact Us
                    </h2>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 mb-2 mt-2">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.6646249251!2d106.91630071488665!3d-6.175632962235532!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698b296300caab%3A0x506e684affecaa08!2sPT.%20Akebono%20Brake%20Astra%20Indonesia!5e0!3m2!1sid!2sid!4v1617615559550!5m2!1sid!2sid" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="col-md-4">
                    <h4>PT Akebono Brake Astra Indonesia</h4>
                    <p style="color: #333434">
                        <i class="bi bi-geo-alt-fill"></i> Jl. Pegangsaan Dua No.55, RT.3/RW.4 Kelapa Gading, Jakarta Utara, DKI Jakarta 14250
                    </p>
                    <p style="color: #333434">
                        <i class="bi bi-telephone-fill"></i> Phone :(021) 46830075
                    </p>
                    <p style="color: #333434">
                        <i class="bi bi-envelope-fill"></i> <a href="mailto:info@akebono-astra.co.id"> E-mail: info@akebono-astra.co.id</a>
                    </p>
                </div>
                <div class="col-md-4 pl-4" style="border-left:1px solid">
                    <ul>
                        <li style="list-style: none;font-family: Inter;font-style: normal;font-weight: 600;font-size: 18px;line-height: 22px;letter-spacing: 0.03em;" class="mb-2"><a href="">Home</a></li>
                        <li style="list-style: none;font-family: Inter;font-style: normal;font-weight: 600;font-size: 18px;line-height: 22px;letter-spacing: 0.03em;" class="mb-2"><a href="">Magang</a></li>
                        <li style="list-style: none;font-family: Inter;font-style: normal;font-weight: 600;font-size: 18px;line-height: 22px;letter-spacing: 0.03em;" class="mb-2"><a href="">Contact</a></li>
                        <li style="list-style: none;font-family: Inter;font-style: normal;font-weight: 600;font-size: 18px;line-height: 22px;letter-spacing: 0.03em;" class="mb-2"><a href="">About Akebono</a></li>
                    </ul>
                </div>

            </div>
            <footer class="footer pl-3" style="margin-bottom:0%;">
                <div class="container" style="color:#2285cd">
                    <div class="row justify-content-between pt-3">
                    <p style="font-size:14px;line-height: normal;font-family: 'PT Sans', sans-serif;">PT. Akebono Brake Astra Indonesia., LTD. All Rights Reserved.<br>
                            Copyright©2023 </p>
                        <div class="social">
                                            <a href="https://www.instagram.com/akebonobrakeastra" class="text-white" target="_blank" style="text-decoration: none"><i class="bi bi-instagram"></i></a>
                                            
                        </div>
                    </div>
                </div>
            </footer>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>
