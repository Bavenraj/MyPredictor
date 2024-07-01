<?php session_start();
$_SESSION["state"]="Kuala Lumpur";
$_SESSION['sucess'] = '0';
$_SESSION['save'] = '0';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Predict Price - MyPredictor</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets1/img/favicon.png" rel="icon">
  <link href="assets1/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
<!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
        <h1 class="text-light"><a href="index.php"><span>MyPredictor</span></a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.php#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">About Us</a></li>
          <li><a class="nav-link scrollto" href="index.php#services">Services</a></li>
          <li><a class="nav-link scrollto" href="index.php#testimonials">Testimonials</a></li>
          <li><a class="nav-link scrollto" href="index.php#faq">FAQ</a></li>
          <li><a class="nav-link scrollto" href="analysetrend.php">Analyze Trend</a></li>
          <li><a class="nav-link scrollto" href="savedPrediction.php">Saved</a></li>
          <li><a class="getstarted scrollto" href="predictprice.php">Predict Now</a></li>
          <li class="dropdown"><a href=""><?php if (isset($_SESSION['email'])){?>Account<i class="bx bx-user" style="font-size: 30px;"></i></a>
                      <ul>
                        <li><a href=""><?php echo $_SESSION['email']?></a></li>
                        <li><a href="logout.php" >Log Out</a></li>
                        
                      </ul>
                    </li><?php }else{ ?>
                      <li class="dropdown"><a href="#"><span>Sign In</span> <i class="bi bi-chevron-down"></i></a>
                      <ul>
                        <li><a href="userLogin.php">User</a></li>
                        <li><a href="adminLogin.php">Admin</a></li>
                      </ul>
                    </li><?php }?></a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <!-- ======= Hero Section ======= -->
  <section id="predict" class="predict d-flex align-items-center">
    <div class="container">
      <div class="row gy-1 d-flex justify-content-between">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h2 data-aos="fade-up">Your Lightning Fast House Prediction</h2>
          <p data-aos="fade-up" data-aos-delay="100">Fill in the form with information about your home, and we will evaluate the home for free. You get the value indication directly on the screen. Then we help you understand how the value changes month by month.</p>

          <form action="predictprice1.php" method="post" class="form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200" onsubmit="return doValidate();">
            <input type="text" list="areas" id='area' name="ar" class="form-control" placeholder="Ampang">
            <datalist id="areas">
            <option value="Ampang">
            <option value="Setapak">
            <option value="Bandar Menjalara">
            <option value="Bandar Tasik Selatan"> 
            <option value="Batu Caves"> 
            <option value="Brickfields"> 
            <option value="Bukit Jalil"> 
            <option value="Bukit Kiara"> 
            <option value="Bukit Tunku"> 
            <option value="KL City Centre"> 
            <option value="Kepong"> 
            <option value="Jalan Kuching"> 
            <option value="Seputeh"> 
            <option value="Mont Kiara"> 
            <option value="Cheras"> 
            <option value="Sentul"> 
            <option value="Desa Petaling"> 
            <option value="Pantai"> 
            <option value="Old Klang Road"> 
            <option value="Dutamas"> 
            <option value="Kampung Kerinchi - Bangsar South"> 
            <option value="Desa Parkcity"> 
            <option value="Bangsar"> 
            <option value="Wangsa Maju"> 
            <option value="Sungai Besi"> 
            <option value="Sri Petaling"> 
            <option value="Segambut"> 
            <option value="Salak South"> 
            <option value="Desa Pandan"> 
            <option value="Taman Desa"> 
            <option value="Jalan Ipoh"> 
            <option value="Sri Hartamas"> 
            <option value="Kuchai Lama"> 
            <option value="Jinjang"> 
            <option value="Taman Tun Dr Ismail"> 
            <option value="Setiawangsa"> 
            <option value="Damansara Heights"> 
            <option value="Keramat"> 
            <option value="KL Sentral"> 
            <option value="Titiwangsa"> 
            <option value="Puchong"> 
            <option value="Mid Valley City"> 
            <option value="Hulu Kelang"> 
            <option value="Sunway SPK"> 
            <option value="Sungai Penchala">
          </datalist>
          <button name="area" type="submit" class="btn btn-primary">GO</button>
            
          </form>
          

          <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="200" data-purecounter-duration="1" class="purecounter"></span>
                <p>Saved Prediction</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="100" data-purecounter-duration="1" class="purecounter"></span>
                <p>Review</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="7327" data-purecounter-duration="1" class="purecounter"></span>
                <p>Historical Data</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="90" data-purecounter-duration="1" class="purecounter"></span>
                <p>Model Accuracy</p>
              </div>
            </div><!-- End Stats Item -->

          </div>
        </div>

        <div class="col-lg-6 order-2 order-lg-2 hero-img" data-aos="zoom-out">
          <img src="assets2/img/predict.png" class="img-fluid mb-3 mb-lg-0" alt="">
        </div>

      </div>
    </div>
  </section><!-- End Hero Section -->
    <!-- ======= Footer ======= -->
    <footer id="footer">

<div class="footer-newsletter">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">

      </div>
    </div>
  </div>
</div>

<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-6 footer-contact">
        <h3>MyPredictor</h3>
        <p>
          No 1, Jln Ampang<br>
          Kuala Lumpur, KL 55308<br>
          Malaysia <br><br>
          <strong>Phone:</strong> +60 1178 9210 23<br>
          <strong>Email:</strong> myPredictor@gmail.com<br>
        </p>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
          <li><i class="bx bx-chevron-right "></i> <a href="#about">About us</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#testimonials">Testimonials</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#faq">FAQ</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Analyze Trend</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Our Services</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Analyze Trend</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Predict Price</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Review Prediction</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Monitor Favorites</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Our Social Networks</h4>
        <p>Connect with us for latest updates</p>
        <div class="social-links mt-3">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

    </div>
  </div>
</div>

</footer><!-- End Footer -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets2/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets2/js/main.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>