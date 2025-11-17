<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Feliz cumpleaños - Ninel</title>
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
                <h1>CUMPLE<span>.</span></h1>
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
                        <h2 data-aos="fade-down">Feliz Cumpleaños <span>Ninel</span></h2>
                        <p data-aos="fade-up">En este gran día te deseo todo lo mejor, espero que sea de tu agrado esta pagina que te diseñe
                            para que te sientas y sepas que eres muy importante para mi y para todos los que te mandaran felicitaciones en tu dia
                            te quiero y te deseo lo mejor me encantas y te amo.
                        </p>
                        <a data-aos="fade-up" data-aos-delay="200" href="#felicitaciones"
                            class="btn-get-started">Felicidades</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-item active"
                style="background-image: url(/assets/img/hero-carousel/fondo4.jpg)">
            </div>
            <div class="carousel-item" style="background-image: url(/assets/img/hero-carousel/fondo2.jpeg)">
            </div>
            <div class="carousel-item" style="background-image: url(/assets/img/hero-carousel/foto3.jpeg)">
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
                                            @elseif (Str::endsWith($c->img,'.mp4', '.mov', 'webm', '.avi', '.gif', '.png', '.jpg', '.jpeg', '.webp'))
                                                <div class="testimonial-img" style="width: 100%; max-width: 120px; margin:0 auto;">
                                                    <video controls class="img-fluid" style="border-radius: 50%;">
                                                        <source src="{{ $c->img }}" type="video/mp4">
                                                        Video
                                                    </video>
                                            @else
                                                <img src="{{ $c->img }}"
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
                                <h4><b>P</b>oemas que te gustan</h4>
                            </a>
                        </li>

                        <li class="nav-item col-3">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                                <h4><b>T</b>E AMO MUCHO</h4>
                            </a>

                        <li class="nav-item col-3">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
                                <h4><b>E</b>l helado de esa vez...</h4>
                            </a>
                        </li>

                        <li class="nav-item col-3">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
                                <h4><b>N</b>ose que titulo poner jajaj</h4>
                            </a>
                        </li>

                        <li class="nav-item col-3">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-5">
                                <h4><b>U</b>no de los videos que tengo</h4>
                            </a>
                        </li>

                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active show" id="tab-1">
                            <div class="row">
                                <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center"
                                    data-aos="fade-up" data-aos-delay="100">
                                    <h3>Nose si te gute o si recuerdo de los que aun te escribia</h3>
                                    <p>
                                        "La felicidad somos tu y yo y ya sabra la despues la vida, No de dejes que no lo sepa,
                                        No me dejes, que se me olvida.", No recuerdo muy bien si te dedique este cuando empezamos a salir
                                        (aun sigo buscando ese cuaderno waaaa)
                                    </p>
                                </div>
                                <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up"
                                    data-aos-delay="200">
                                    <img src="/assets/img/foto1.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab-2">
                            <div class="row">
                                <div
                                    class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                                    <h3>Creo que este lo escribi en unos de tus cuadernos que te quite jsjsj</h3>
                                    <p>
                                        "Quiero puntos seguidos en los ratos de alegria, y puntos finales en tu adios.
                                        Quiero laberintos sin salida en las calles de tus deseos.
                                        Quiero ser la ultima silaba de tu invierno y la primera de tu historia,
                                        conmigo....."(como voy recordando estos poemas xd) no se que decirte porque
                                        me quedo corto de palabaras al solo pensar en ti podria contar miles de historias que tuvimos
                                        juntos pero en solo pensar en eso es pensar que no te quiero perder nunca.
                                    </p>
                                </div>
                                <div class="col-lg-6 order-1 order-lg-2 text-center">
                                    <img src="/assets/img/foto2.jpeg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab-3">
                            <div class="row">
                                <div
                                    class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                                    <h3>Porque esperas?</h3>
                                    <p>
                                        "Porque esperas que caminemos en terreno plano si siempre hemos sido torbellino,
                                        terraceria con subidas y bajadas, y curvas peligrosas, con cimas y precipicios,
                                        llenos de fuego, de vida. Que no vez que el universo, al igual que tu y yo, amor,
                                        es un bello e intenso...... caos?." la mayoria de poemas que te dedicaba eran por una razon 
                                        y esa razon eras y seguiras siendo tu mi gran amor.
                                    </p>
                                </div>
                                <div class="col-lg-6 order-1 order-lg-2 text-center">
                                    <img src="/assets/img/foto3.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab-4">
                            <div class="row">
                                <div
                                    class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                                    <h3>Hay tantas cosas de ti...</h3>
                                    <p>
                                        "Hay tantas cosas de ti, amor, que no se, que no puedo responder,
                                        que no comprendo y que probablemente nunca comprendere,
                                        pero vivo con una certeza: aun me quedan universos, galaxias y estrellas
                                        que solo conquistaré si tu te quedas, que solo descubrire si peleas conmigo y no contra mi..."
                                        con esto acabo lo que queria decirte no soy bueno en esta cosa de hablar y quien se tomo 
                                        el tiempo de leer hasta aca (pos chido pero deja de ser curioso deja de espiar mi pagina web jaja
                                        solo pon las felicitaciones en la parte de felicitar), y si eres Ninel perdi un video que queria poner aca el
                                        de que te hice montar un caballo jajaj.
                                    </p>
                                </div>
                                <div class="col-lg-6 order-1 order-lg-2 text-center">
                                    <img src="/assets/img/foto4.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab-5">
                            <div class="row">
                                <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                                    <h3>Recuerdo aun cuando tenias mucho tiempo</h3>
                                    <p>
                                        Extraño esos dias donde no nos preocupabamos de literalmente el tiempo,
                                        Teníamos todo el dia juntos y aun mas que todo cuando nos poniamos a leer libros en la plaza
                                        y la gente nos miraba jajaj todo un mame espero que te guste esta pagina te quiero pasala bien en tu dia amor.
                                    </p>
                                </div>
                                <div class="col-lg-6 order-1 order-lg-2 text-center">
                                    <video controls autoplay muted loop class="img-fluid" style="width: 100%; height: auto;">
                                        <source src="/assets/img/video1.mp4" type="video/mp4">
                                        Tu navegador no soporta la reproducción de video.
                                    </video>
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
                                <h3>Benja</h3>
                                <strong>Telefono:</strong> 76402452<br>
                                <strong>Email:</strong> avilagarciabenjamin@gmail.com<br>
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
                        &copy; Copyright <strong><span>benja</span></strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        Designed by <a>Rodrigo Trejo</a> Distributed by benja<a>Alfraber</a>
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
