<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Jobs.Pylon</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

        <!-- Vendor CSS Files -->
        <link href="{{ url('/') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ url('/') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="{{ url('/') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{ url('/') }}/assets/css/style.css" rel="stylesheet">
        <!-- JS -->
        <!-- <script src="{{ url('/') }}/assets/js/main.js"></script> -->
    </head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <img src="{{ url('/') }}/img/logo.png" alt="">
      </a>

      <nav id="navbar" class="navbar">
        @yield('topbar')
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  @yield('hero')

  <main id="main">
    @yield('content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="{{ url('/') }}/img/logo.png" alt="">
    
            </a>
            <p>Like and Follow us on:</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="https://www.facebook.com/PylonOnline" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="https://www.instagram.com/pylononline/" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin bx bxl-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Social Media Marketing</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Branding Strategy</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Website Development</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Contact Center</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>
            Benito Labao Ext. Roosevelt,
            Brgy. Saray-Tibanga 9200 Iligan City <br><br>
              <strong>Tel No.:</strong> (063) 228-4272 or (063) 302 9758<br>
              <strong>Email:</strong> pylonglobal@gmail.com<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Pylon Jobs</span></strong>. All Rights Reserved
      </div>
      
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ url('/') }}/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="{{ url('/') }}/assets/vendor/aos/aos.js"></script>
  <script src="{{ url('/') }}/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{ url('/') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{ url('/') }}/assets/vendor/purecounter/purecounter.js"></script>
  <script src="{{ url('/') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ url('/') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ url('/') }}/assets/js/main.js"></script>

</body>

</html>
