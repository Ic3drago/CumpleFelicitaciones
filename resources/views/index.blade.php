<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Feliz cumpleaños - Nombre</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="assets/img/pastelicon.jpeg" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="/assets/css/main.css" rel="stylesheet">

</head>

<body>
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="" class="logo d-flex align-items-center">
                <h1>LOGO<span>.</span></h1>
            </a>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="#" class="active">Inicio</a></li>
                    <li><a href="#felicitaciones">Feliz Cumpleaños</a></li>
                    <li><a href="#love">Love</a></li>
                    <li><a href="/felicitar">Felicitar</a></li>
                </ul>
            </nav>

        </div>
    </header>
    <section id="hero" class="hero">

        <div class="info d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2 data-aos="fade-down">Feliz Cumpleaños <span>Nombre</span></h2>
                        <p data-aos="fade-up">Lorem ipsum dolor sit amet consectetur adipiscing elit congue sed,
                            porttitor purus maecenas aliquam urna pretium nostra interdum morbi risus, in orci feugiat
                            sociis habitant nulla vulputate accumsan.
                        </p>
                        <a data-aos="fade-up" data-aos-delay="200" href="#felicitaciones"
                            class="btn-get-started">Felicidades</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-item active"
                style="background-image: url(/assets/img/hero-carousel/fondo-principal.jpeg)">
            </div>
            <div class="carousel-item" style="background-image: url(/assets/img/hero-carousel/fondo-principal.jpeg)">
            </div>
            <div class="carousel-item" style="background-image: url(/assets/img/hero-carousel/fondo-principal.jpeg)">
            </div>
            <div class="carousel-item" style="background-image: url(/assets/img/hero-carousel/fondo-principal.jpeg)">
            </div>

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>

        <main id="main">
            <section id="felicitaciones" class="testimonials section-bg">
                <div class="container" data-aos="fade-up">

                    <div class="section-header">
                        <h2>Felicitaciónes</h2>
                    </div>

                    <div class="slides-2 swiper">
                        <div class="swiper-wrapper">

                            @foreach ($congra as $c)
                                <div class="swiper-slide ">
                                    <div class="testimonial-wrap ">
                                        <div class="testimonial-item ">
                                            @if ($c->img == null)
                                                <img src="/assets/img/felicitaciones/no-img.jpeg"
                                                    class="testimonial-img" alt="">
                                            @else
                                                <img src="/assets/img/felicitaciones/{{ $c->img }}"
                                                    class="testimonial-img" alt="">
                                            @endif

                                            <h3 class="mayus">{{ $c->name }}</h3>
                                            <h4>{{ $c->identificador }}</h4>
                                            <p>
                                                <i class="bi bi-quote quote-icon-left"></i>
                                                {{ $c->description }}
                                                <i class="bi bi-quote quote-icon-right"></i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                </div>
            </section>
            <section id="love" class="features section-bg">
                <div class="container" data-aos="fade-up">
                    <div class="section-header">
                        <h2>Love</h2>
                    </div>

                    <ul class="nav nav-tabs row  g-2 d-flex">

                        <li class="nav-item col-3">
                            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                                <h4><b>T</b>itulo uno</h4>
                            </a>
                        </li>

                        <li class="nav-item col-3">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                                <h4><b>T</b>itulo dos</h4>
                            </a>

                        <li class="nav-item col-3">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
                                <h4><b>T</b>itulo tres</h4>
                            </a>
                        </li>

                        <li class="nav-item col-3">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
                                <h4><b>T</b>itulo cuatro</h4>
                            </a>
                        </li>

                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active show" id="tab-1">
                            <div class="row">
                                <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center"
                                    data-aos="fade-up" data-aos-delay="100">
                                    <h3>Titulo uno</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit congue sed, porttitor
                                        purus maecenas aliquam urna pretium nostra interdum morbi risus, in orci feugiat
                                        sociis habitant nulla vulputate accumsan. Leo aptent blandit dictumst massa dis
                                        rutrum proin ultricies lacus orci, molestie quis habitasse cursus lacinia
                                        convallis iaculis luctus inceptos, tempus facilisis rhoncus tortor morbi
                                        eleifend nisl at habitant. Magna facilisi elementum ac enim quis venenatis morbi
                                        nascetur aenean leo, primis cursus auctor urna gravida maecenas massa eu
                                        sollicitudin.
                                    </p>
                                </div>
                                <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up"
                                    data-aos-delay="200">
                                    <img src="/assets/img/foto.jpeg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab-2">
                            <div class="row">
                                <div
                                    class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                                    <h3>Titulo dos</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit congue sed, porttitor
                                        purus maecenas aliquam urna pretium nostra interdum morbi risus, in orci feugiat
                                        sociis habitant nulla vulputate accumsan. Leo aptent blandit dictumst massa dis
                                        rutrum proin ultricies lacus orci, molestie quis habitasse cursus lacinia
                                        convallis iaculis luctus inceptos, tempus facilisis rhoncus tortor morbi
                                        eleifend nisl at habitant. Magna facilisi elementum ac enim quis venenatis morbi
                                        nascetur aenean leo, primis cursus auctor urna gravida maecenas massa eu
                                        sollicitudin.
                                    </p>
                                </div>
                                <div class="col-lg-6 order-1 order-lg-2 text-center">
                                    <img src="/assets/img/foto.jpeg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab-3">
                            <div class="row">
                                <div
                                    class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                                    <h3>Titulo tres</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit congue sed, porttitor
                                        purus maecenas aliquam urna pretium nostra interdum morbi risus, in orci feugiat
                                        sociis habitant nulla vulputate accumsan. Leo aptent blandit dictumst massa dis
                                        rutrum proin ultricies lacus orci, molestie quis habitasse cursus lacinia
                                        convallis iaculis luctus inceptos, tempus facilisis rhoncus tortor morbi
                                        eleifend nisl at habitant. Magna facilisi elementum ac enim quis venenatis morbi
                                        nascetur aenean leo, primis cursus auctor urna gravida maecenas massa eu
                                        sollicitudin.
                                    </p>
                                </div>
                                <div class="col-lg-6 order-1 order-lg-2 text-center">
                                    <img src="/assets/img/foto.jpeg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab-4">
                            <div class="row">
                                <div
                                    class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                                    <h3>Titulo cuatro</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit congue sed, porttitor
                                        purus maecenas aliquam urna pretium nostra interdum morbi risus, in orci feugiat
                                        sociis habitant nulla vulputate accumsan. Leo aptent blandit dictumst massa dis
                                        rutrum proin ultricies lacus orci, molestie quis habitasse cursus lacinia
                                        convallis iaculis luctus inceptos, tempus facilisis rhoncus tortor morbi
                                        eleifend nisl at habitant. Magna facilisi elementum ac enim quis venenatis morbi
                                        nascetur aenean leo, primis cursus auctor urna gravida maecenas massa eu
                                        sollicitudin.
                                    </p>
                                </div>
                                <div class="col-lg-6 order-1 order-lg-2 text-center">
                                    <img src="/assets/img/foto.jpeg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main>

        <footer id="footer" class="footer">
            <div class="footer-content position-relative">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-4 col-md-6">
                            <div class="footer-info">
                                <h3>Nombre</h3>
                                <strong>Telefono:</strong> Telefono<br>
                                <strong>Email:</strong> ejemplo@email.com<br>
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-3 footer-links">

                        </div>

                        <div class="col-lg-2 col-md-3 footer-links">
                            <h4>Links</h4>
                            <ul>
                                <li><a href="#" class="active">Inicio</a></li>
                                <li><a href="#felicitaciones">Feliz Cumpleaños</a></li>
                                <li><a href="#love">Love</a></li>
                                <li><a href="/felicitar">Felicitar</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-2 col-md-3 footer-links">

                        </div>

                        <div class="col-lg-2 col-md-3 footer-links">

                        </div>

                    </div>
                </div>
            </div>

            <div class="footer-legal text-center position-relative">
                <div class="container">
                    <div class="copyright">
                        &copy; Copyright <strong><span>Nombre</span></strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        Designed by <a>Rodrigo Trejo</a> Distributed by <a>Alfraber</a>
                    </div>
                </div>
            </div>

        </footer>

        <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <div id="preloader"></div>

        <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/vendor/aos/aos.js"></script>
        <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="/assets/vendor/php-email-form/validate.js"></script>

        <script src="/assets/js/main.js"></script>

</body>

</html>
