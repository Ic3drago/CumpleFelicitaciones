<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Felicitar - Nombre</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/pastelicon.jpeg" rel="icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/main.css" rel="stylesheet">

</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>LOGO<span>.</span></h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/" >Inicio</a></li>
          <li><a href="/#felicitaciones">Feliz Cumpleaños</a></li>
          <li><a href="/#love">Love</a></li>
          <li><a href="/felicitar" class="active">Felicitar</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">

    <div class="info d-flex align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <form action="{{route('congratulation.store')}}" enctype="multipart/form-data"
            method="POST">
                @csrf
                <label for="name" class="form-label label-txt">Nombre</label>
                <input  required type="text" name="name" class="form-control" >
                <div  class="form-text">
                    Escribe un nombre con el que Nombre te pueda identificar
                </div>
                <label for="identificador" class="form-label label-txt">Identificador</label>
                <input  required  type="text" name="identificador" class="form-control" >
                <div  class="form-text">
                    Un apodo o algo para que Nombre te identifique, puede ser una palabra, la escuela donde estudias o donde se conocieron
                </div>
                <label for="description" class="form-label label-txt">Felicitacion</label>
                <textarea  maxlength="400" required name="description" class="form-control" rows="5"></textarea>
                <div  class="form-text">
                    Escribe un mensaje de felicitaciones para Nombre. Max 400 caracteres
                </div>
                <label for="imagen" class="form-label  label-txt">Foto</label>
                <input type="file" name="imagen" class="form-control">
                <div  class="form-text">
                    Opcional
                </div>
                <div class="col-12 form-check pt-2">
                    <button type="submit" class="btn btn-outline-light">Enviar</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

      <div class="carousel-item active" style="background-image: url(assets/img/hero-carousel/fondo-principal.jpeg)">
      </div>
      <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/fondo-principal.jpeg)"></div>
      <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/fondo-principal.jpeg)"></div>
      <div class="carousel-item" style="background-image: url(assets/img/hero-carousel/fondo-principal.jpeg)"></div>

      <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>

  </section><!-- End Hero Section -->

    <main id="main">
    </main><!-- End #main -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>

</body>

</html>