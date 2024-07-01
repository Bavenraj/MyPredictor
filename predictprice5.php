<?php session_start();
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
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
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
          <li class="dropdown"><a href=""><?php if (isset($_SESSION['email'])) {?>Account<i class="bx bx-user" style="font-size: 30px;"></i></a>
                      <ul>
                        <li><a id="email" href=""  ><?php echo $_SESSION['email'] ?></a></li>
                        <li><a href="logout.php" >Log Out</a></li>

                      </ul>
                    </li><?php } else {?>
                      <li class="dropdown"><a href="#"><span>Sign In</span> <i class="bi bi-chevron-down"></i></a>
                      <ul>
                        <li><a id="email" href="userLogin.php" >User</a></li>
                        <li><a href="adminLogin.php">Admin</a></li>
                      </ul>
                    </li><?php }?></a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Now the prediction is ready</h1>
          <h2>And you can take it easy</h2>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" style="padding-left:150px;">
          <img src="assets/img/tick2.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->


  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row " style="margin-left:100px;">
          <div class="col-lg-4 d-flex align-items-center justify-content-center about-img">
          <?php include("map.php"); ?>
          </div>
          <div class="col-lg-8 pt-5 pt-lg-0">
            <h3 data-aos="fade-up"><?php echo $_SESSION["area"] . ", " . $_SESSION["state"]; ?></h3>
            <h4  style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                <?php echo $_SESSION["buildingType"]; ?>
                <?php echo " - "; ?>
                <?php echo $_SESSION["tenure"]; ?>
                <?php echo " - "; ?>
                <?php echo $_SESSION["floor"] . " Floors"; ?>
                <?php echo " - "; ?>
                <?php echo $_SESSION["size"] . " ft²"; ?>
            </h4>
            <div class="predicted-symbol">≈
              <div class="predicted-price" data-aos="fade-up" data-aos-delay="100">
              <?php
                #$num1 = $_SESSION["size"];
                #$price = shell_exec("py test.py $num1 2 3 ");
                $model_tenure = $_SESSION["tenure"];
                $model_size = $_SESSION["size"];
                $model_floors = $_SESSION["floor"];
                $model_lat = $_SESSION["latitude"];
                $model_long = $_SESSION["longitude"];
                $model_building = $_SESSION["buildingType"];
                $price = shell_exec("py test.py $model_tenure $model_size $model_floors $model_lat $model_long $model_building ");
                $_SESSION['price'] = $price;
                $formatted_output = number_format($price, 2, '.', ',');
                echo "RM " . $formatted_output;
              ?>
              </div>
            </div>
            <div style="font-weight:bold;font-size:20px; margin-top:20px;">How we arrived with the prediction</div>
            <div data-aos="fade-up" data-aos-delay="100" style="font-size:24px; margin-top:20px;color:#5a6570;">
            MyPredictor’s prediction are purely statistical and are calculated based on historical transaction data of home, such as its location, size and number of floors.<br><br>
            The predicted value should be considered as an indication of value and for a more accurate valuation you are advised to contact a real estate agent or authorized valuer.
            </div>
            <div data-aos="fade-up" data-aos-delay="100" style="position:relative;" class="heart" >
                <div style="font-size:24px; margin-top:20px;color:#5a6570; font-weight:bold;display: flex; flex-direction: row;align-items: center;">
                <?php if($_SESSION["save"] == '0') {?>
                  <i  onclick="savePrediction();" class="bx bx-heart" id="save" style="font-size:2.5rem;margin-top:0; cursor:pointer; border-color:red;" ></i>
                  <label id="save-label" style="margin-left:2px;">Save Prediction</label>
                <?php ;} else{ ?>
                  <i   class="bx bxs-heart" id="save" style="font-size:2.5rem;margin-top:0; border-color:red;" ></i>
                  <label id="save-label" style="margin-left:2px;">Saved! (Click on "Saved" tab to view)</label>
                <?php ;} ?>
                </div>
                <h5 class="red" id='error'></h5>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
        <!-- ======= About Section ======= -->
        <section id="section" class="services section-bg">
      <div class="container">

        <div class="row justify-content-between">
          <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
            <img src="assets/img/about-img.svg" class="img-fluid" alt="" data-aos="zoom-in">

          </div>
          <div class="col-lg-6 pt-5 pt-lg-0 ">
            <h2 data-aos="fade-up" style="font-weight:bold;">Let us know how you feel about the prediction!</h2>
            <p data-aos="fade-up" data-aos-delay="100" style="font-size:18px;">
              Many people spent an unnecessary amount of time in finding the real value of a house.
            </p>
            <?php if ($_SESSION['sucess'] == '1') {?>


                <dialog  open id="centerpoint">
                  <div id="dialog">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8b/Eo_circle_green_white_checkmark.svg/2048px-Eo_circle_green_white_checkmark.svg.png" width="100" height="100"><br><h3>Review Sucessfully Submitted</h3>
                  </div>
                </dialog>
              <?php ;}?>
            <div class="wrapper">

              <h3>How Was Your Prediction</h3>

              <form action="savereview.php" method="post"  onsubmit="return submitted();" >
                <div class="rating">

                  <input type="number" name="rating" id="rating" hidden>

                  <i class='bx bx-star star' style="--i: 0;" onclick="toggleReview()"></i>
                  <i class='bx bx-star star' style="--i: 1;" onclick="toggleReview()"></i>
                  <i class='bx bx-star star' style="--i: 2;" onclick="toggleReview()"></i>
                  <i class='bx bx-star star' style="--i: 3;" onclick="toggleReview()"></i>
                  <i class='bx bx-star star' style="--i: 4;" onclick="toggleReview()"></i>
                </div>
                      <h5 class="red" id='error'></h5>
                <textarea name="review"  cols="30" rows="5" placeholder="Your review..." id= 'js' disabled></textarea>
                <div class="btn-group">
                  <button type="submit" id="submit" name="submit" class="btn submit" onclick="submitted();">Submit</button>
                  <button class="btn cancel" >Cancel</button>
                </div>
              </form>
              <div id="response"></div>
	</div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer">
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

    <script>
      const allStar = document.querySelectorAll('.rating .star')
const ratingValue = document.querySelector('.rating input')
            <?php if ($_SESSION['sucess'] == '0') {?>

      allStar.forEach((item, idx)=> {
	item.addEventListener('click', function () {
		let click = 0
		ratingValue.value = idx + 1

		allStar.forEach(i=> {
			i.classList.replace('bxs-star', 'bx-star')
			i.classList.remove('active')
		})
		for(let i=0; i<allStar.length; i++) {
		if(i <= idx)
      {
				allStar[i].classList.replace('bx-star', 'bxs-star')
				allStar[i].classList.add('active')
			}
      else {
				allStar[i].style.setProperty('--i', click)
				click++
			}
		}
	})
})<?php ;}?>
      <?php if ($_SESSION['sucess'] == '1') { ?>
        allStar.forEach((item, idx)=> {
        window.addEventListener('load', function () {
          for(let i=0; i< <?php echo $_SESSION['rating']; ?>; i++) {
              allStar[i].classList.replace('bx-star', 'bxs-star')
              allStar[i].classList.add('active')
          }})
        })
        document.getElementById("js").value = "<?php echo $_SESSION['review']; ?>";
<?php ;}?>
    </script>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


</body>

</html>