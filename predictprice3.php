<?php session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tenure = $_POST["tenure"];}
    if(empty($tenure)){
      $_SESSION["tenure"] ;
    }else{    $_SESSION["tenure"] = $tenure;}
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
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" style="width:100%;">
          <h2 data-aos="fade-up">Predict A House</h2>
          <p data-aos="fade-up" data-aos-delay="100" style="font-size : 30px;"><?php echo $_SESSION["state"]." \ " . $_SESSION["area"] . " \ " . $_SESSION["buildingType"] . " \ " . $_SESSION["tenure"] ?></p>
          <div class="wrap" >
            <div class="progress2">
            <div class="links">
              <div class="dot" style="background:#eb5d1e;"></div>
              <div class="dot"style="background:#eb5d1e;"></div>
              <div class="dot"style="background:#eb5d1e;"></div>
              <div class="dot"style="background:#ccc;"></div>
            </div>
            </div>
          </div>
          <div class="rap">
            <div class="inks">
              <div  style="margin-right:-120px;">Building Type</div>
              <div  style="margin-right:-100px;">Tenure</div>
              <div  style="margin-right:-110px;">Details</div>
              <div  style="margin-right:-180px;">Complete</div>
            </div>
          </div>
          <form action="predictprice4.php" method="post">
            <div style="margin-left:80px; margin-top:50px;font-size:24px;">Enter the house details</div>
            <div class="radio-tile-group1">
                  <div class="input-container2">
                    <label for="size" style="font-weight:bold; margin-bottom:5px;">Living Area</label> <br>
                    <input type="number" id="size" name="size" placeholder="Enter in square feets" min="750" max="5000" >
                  </div>
                  <div class="input-container2">
                    <label for="floor" style="font-weight:bold; margin-bottom:5px;">Number of Floors</label> <br>
                    <?php     
                        $nonLanded = array("Apartment", "Flat", "Condominium", "Service Residence");
                        if (in_array($_SESSION["buildingType"], $nonLanded))
                        {?>
                          <input type="number" id="floor" name="floor" placeholder="Non-Landed House Floor is set to 1" disabled>
                        <?php ;}
                      else
                        {?>
                          <input type="number" id="floor" name="floor" placeholder="Enter number of floors" min="1" max="4">
                        <?php ;}
                    ?>
                  </div>
              </div>
            <div>
              <div class="button-tile-group">
                <div class="button-container">
                  <div class="button-tile">
                  <a href="predictprice2.php" onclick="predictprice2();">Back</a>
                  </div>
                </div>
                <div class="button-container">
                  <div class="button-tile">
                    <button type="submit"  >Continue</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
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