<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HomePage - MyPredictor</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets1/img/favicon.png" rel="icon">
  <link href="assets1/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

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
      </nav>

    </div>
  </header>

  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Predict House Price Using Machine Learning</h1>
          <h2>Get the value indication right on screen</h2>
          <div>
            <a href="predictprice.php" class="btn-get-started scrollto">Predict Now</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="assets/img/image1.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section>

  <main id="main">
    <section id="about" class="about">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
            <img src="assets/img/about-img.svg" class="img-fluid" alt="" data-aos="zoom-in">
          </div>
          <div class="col-lg-6 pt-5 pt-lg-0">
            <h3 data-aos="fade-up">What is MyPredictor</h3>
            <p data-aos="fade-up" data-aos-delay="100">
              At MyPredictor, we're on a mission to make property investment easier and more accessible for everyone. 
              Our dedicated team of data scientists and developers have crafted a user-friendly platform that empowers you to predict house prices, 
              analyze market trends, and make informed decisions in the Malaysian real estate market. We're committed to providing you with accurate predictions 
              and transparent insights, so you can confidently navigate the dynamic world of real estate. Join us in your journey to smarter and data-driven property investments.
            </p>
            <div class="row">
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-data"></i>
                <h4>Verified Data Source</h4>
                <p>The transaction data is obtained from brickz.my and verified by JPPH</p>
              </div>
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-brain"></i>
                <h4>Accurate Model Prediction</h4>
                <p>The value indication for home is predicted with a robust model of 90% accuracy</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Services</h2>
          <p>Check out the great services we offer</p>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-line-chart"></i></div>
              <h4 class="title"><a href="">Analyze Price Trend</a></h4>
              <p class="description">Explore historical trends in the Malaysian real estate market with our 'Analyze Trend' feature</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-search-alt"></i></div>
              <h4 class="title"><a href="">Predict Price</a></h4>
              <p class="description">Estimate house prices with precision using our accurate and powerful machine learning model</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-star"></i></div>
              <h4 class="title"><a href="">Review Prediction</a></h4>
              <p class="description">Evaluate the reliability of predictions, fostering transparency in your decision-making process</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-heart"></i></div>
              <h4 class="title"><a href="">Monitor Favorites</a></h4>
              <p class="description">Store and access all your predicted prices in one place for future reference</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">
        <div class="row align-items-center">
          <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
            <h3>Testimonials</h3>
            <p>
              Discover the MyPredictor difference through the experiences of our users. Real stories, real impact. 
              Your feedback drives our commitment to precise property predictions and informed decision-making in real estate.
            </p>
          </div>
          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
            <div class="swiper">
              <template class="swiper-config">
                {
                  "loop": true,
                  "speed" : 600,
                  "autoplay": {"delay": 5000},
                  "slidesPerView": "auto",
                  "pagination": {"el": ".swiper-pagination", "type": "bullets", "clickable": true }
                }
              </template>
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="d-flex">
                      <div>
                        <h3>Mohd Ismail</h3>
                        <h4>20-03-2024</h4>
                        <div class="stars">
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                      </div>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      <span>MyPredictor accurately predicted the value of my property, giving me confidence in my decision-making. A fantastic tool for anyone navigating the real estate market!</span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="d-flex">
                      <div>
                        <h3>Sara Eudora</h3>
                        <h4>12-02-2024</h4>
                        <div class="stars">
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                      </div>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      <span>I was pleasantly surprised by the precision of MyPredictor's predictions. The detailed insights helped me understand the factors influencing my property's value. Highly recommended!</span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="d-flex">
                      <div>
                        <h3>Lee Weng How</h3>
                        <h4>01-05-2024</h4>
                        <div class="stars">
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                      </div>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      <span>MyPredictor has become my go-to for property valuation. The ease of use and reliability of the predictions make it an invaluable resource in the real estate journey. Kudos to the team!</span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="d-flex">
                      <div>
                        <h3>Mathew</h3>
                        <h4>30-03-2024</h4>
                        <div class="stars">
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                      </div>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      <span>The transparency and accuracy of MyPredictor exceeded my expectations. It provided me with a clear understanding of my property's potential value, making it an essential tool in my homeownership journey.</span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="d-flex">
                      <div>
                        <h3>John Liu</h3>
                        <h4>20-02-2024</h4>
                        <div class="stars">
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                      </div>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      <span>MyPredictor's predictions were not only accurate but also helped me make informed decisions about my property. The user-friendly interface and insightful data make it a standout in the real estate tech landscape.</span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>F.A.Q</h2>
          <p>Frequently Asked Questions</p>
        </div>

        <ul class="faq-list" data-aos="fade-up" data-aos-delay="100">
          <li>
            <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">What is Machine Learning? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq1" class="collapse" data-bs-parent=".faq-list">
              <p>
                MyPredictor's Machine Learning is a sophisticated technology that leveraging advanced algorithms to analyze property attributes and provide accurate price estimations.
              </p>
            </div>
          </li>
          <li>
            <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Will anyone else be able to see my prediction? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq2" class="collapse" data-bs-parent=".faq-list">
              <p>
                No, your predictions are private and secure. MyPredictor ensures confidentiality, and only you have access to your individual predictions. 
                <br>We prioritize user privacy and data protection, following strict security measures to safeguard your information.
              </p>
            </div>
          </li>
          <li>
            <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Does it cost anything? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq3" class="collapse" data-bs-parent=".faq-list">
              <p>
                The core features of MyPredictor, including prediction and analysis tools, are provided at no cost. 
                <br>However, additional premium features may be introduced in the future, and users will be notified of any associated costs. 
                <br>We are committed to offering transparent and flexible pricing for enhanced services.              </p>
            </div>
          </li>
          <li>
            <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">What is the prediction based on? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq4" class="collapse" data-bs-parent=".faq-list">
              <p>
                We make valuations so that you as a buyer, seller or curious user will get an indication of how much different homes are worth. 
                <br>The statistical value is predicted based on how much information is available about the home and the surrounding area. 
                <br>We compare the home with other sales prices nearby that are similar to the home. This means that in areas where there are not many sales, or if the home is too unique, it becomes more difficult to make a statistical assessment of the value.              </p>
            </div>
          </li>
          <li>
            <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">The value is incorrect, can MyPredictor help me update the value? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq5" class="collapse" data-bs-parent=".faq-list">
              <p>
                MyPredictor generates predictions based on historical data and machine learning algorithms. 
                If you believe there is an error in the predicted value, we recommend reviewing the input data provided.
                Your feedback is valuable in refining our system for enhanced performance.              </p>
            </div>
          </li>
          <li>
            <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">MyPredictor's valuation does not match my broker's valuation? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq6" class="collapse" data-bs-parent=".faq-list">
              <p>
                Because MyPredictor's values ​​are statistical, they are intended as just an indication of the home's value. In other words, they cannot replace a valuation made by a trained broker. 
                <br>In other words, if you have received a valuation from a realtor, that is who you should start with, as they can see the home in reality and take details into account.              </p>
            </div>
          </li>
        </ul>
      </div>
    </section>
  </main>

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
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="assets/js/main.js"></script>

</body>
</html>