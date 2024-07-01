<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Saved Prediction - MyPredictor</title>
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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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
          <li><a class="nav-link scrollto active" href="savedPrediction.php">Saved</a></li>
          <li><a class="getstarted scrollto" href="predictprice.php">Predict Now</a></li>
          <li class="dropdown"><a href=""><?php if (isset($_SESSION['email'])) {?>Account<i class="bx bx-user" style="font-size: 30px;"></i></a>
                      <ul>
                        <li><a href=""><?php echo $_SESSION['email'] ?></a></li>
                        <li><a href="logout.php" >Log Out</a></li>

                      </ul>
                    </li><?php } else {?>
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
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Saved Prediction</h1>
          <h2>View your saved prediction here</h2>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" style="padding-left:150px;">
          <img src="assets/img/save.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section><!-- End Hero -->
  <?php if (isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    include("config.php");
    $sql = "SELECT * FROM prediction left join review on prediction.id = review.predictionID WHERE prediction.userID = (SELECT id from user where email='$email');";
    $sql1 = "SELECT * FROM prediction left join review on prediction.id = review.predictionID WHERE prediction.userID = (SELECT id from user where email='$email') and rating is not null;";
    $sql2 = "SELECT * FROM prediction left join review on prediction.id = review.predictionID WHERE prediction.userID = (SELECT id from user where email='$email') and review is not null;";
    $sql3 = "SELECT * FROM prediction left join review on prediction.id = review.predictionID WHERE prediction.userID = (SELECT id from user where email='$email') and date = CURRENT_DATE();";
    
    $result = $connection->query($sql);
    $result1 = $connection->query($sql1);
    $result2 = $connection->query($sql2);
    $result3 = $connection->query($sql3);
    $row = [];  
    if ($result->num_rows > 0)  
    { 
      $row = $result->fetch_all(MYSQLI_ASSOC);   
    }  
    $totalSaved = count($row); 
  
    $row1=mysqli_num_rows($result1);
    $row2=mysqli_num_rows($result2);
    $row3=mysqli_num_rows($result3);
    ?>
  <div class="row gy-4" data-aos="fade-up" data-aos-delay="400" style="margin-top:50px;">
    <div class="col-lg-3 col-6">
      <div class="stats-item text-center w-100 h-100">
        <span data-purecounter-start="0" data-purecounter-end=<?php echo $row3; ?> data-purecounter-duration="10" class="purecounter"></span>
        <p>Prediction Saved Today</p>
      </div>
    </div><!-- End Stats Item -->
    <div class="col-lg-3 col-6">
      <div class="stats-item text-center w-100 h-100">
        <span data-purecounter-start="0" data-purecounter-end=<?php echo $totalSaved; ?> data-purecounter-duration="10" class="purecounter"></span>
        <p>Total Prediction Saved</p>
      </div>
    </div><!-- End Stats Item -->
    <div class="col-lg-3 col-6">
      <div class="stats-item text-center w-100 h-100">
        <span data-purecounter-start="0" data-purecounter-end=<?php echo $row1; ?> data-purecounter-duration="10" class="purecounter"></span>
        <p>Total Prediction Rated</p>
      </div>
    </div><!-- End Stats Item -->
    <div class="col-lg-3 col-6">
      <div class="stats-item text-center w-100 h-100">
        <span data-purecounter-start="0" data-purecounter-end=<?php echo $row2; ?> data-purecounter-duration="10" class="purecounter"></span>
        <p>Total Prediction Reviewed</p>
      </div>
    </div><!-- End Stats Item -->
  </div>

  <main id="main" style="display:flex; flex-wrap:wrap; justify-content:space-around; margin-top:20px;">
    <!-- ======= About Section ======= -->
    <?php    
      if(!empty($row)) 
      foreach($row as $rows) { ?>
    <section id="about" class="about" style="width: 720px; padding: 30px 0px; ">
      <div class="container" data-aos="fade-up" data-aos-delay="100" >
        <div class="row " style="margin-left:0px; ">
          <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
          <?php if($rows['area'] == 'Ampang'){ ?>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15934.900248094451!2d101.74163246747894!3d3.166949600554501!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc37a1397122b9%3A0xe074f5244e6f3cec!2sAmpang%2C%20Kuala%20Lumpur%2C%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1703336655043!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Setapak'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15934.562553372256!2d101.68667132711586!3d3.1888192099970563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc48003a4df2c7%3A0xd643f05fc4ca1fcc!2sSetapak%2C%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705122026039!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Bandar Menjalara'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15934.481161086342!2d101.61984317598001!3d3.1940679230268025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc461daad19ddb%3A0x76cf3b992f1a0551!2sBandar%20Menjalara%2C%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705149588519!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Bandar Tasik Selatan'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15936.33897276669!2d101.69928022597755!3d3.072033327484727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc357f9d35c489%3A0x3cd33b41224501b8!2sBandar%20Tasik%20Selatan%2C%2057000%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705122840378!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Batu Caves'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.8590588847082!2d101.68148397363552!3d3.1319250532610785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc49a55325849f%3A0xfe3244d6f984e997!2sBatu%20Caves!5e0!3m2!1sen!2smy!4v1705125354153!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>    
          <?php ;} else if($rows['area'] == 'Brickfields'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15935.477088419279!2d101.67605652597867!3d3.1292394254069746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc49eb1cbfe4d7%3A0x87dd71c953d26dae!2sBrickfields%2C%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705149616268!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Bukit Jalil'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31873.149530251547!2d101.66556081891694!3d3.056196657915886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4aeb35ab3159%3A0xf8beaa5a195afa63!2sBukit%20Jalil%2C%2057000%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705125471640!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Bukit Kiara'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31870.536361398696!2d101.62024636892373!3d3.1429486988281656!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc49182a65e22b%3A0xa3310357c29e8c40!2sBukit%20Kiara%2C%2060000%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705149634800!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Bukit Tunku'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15934.88939476766!2d101.66743827597945!3d3.1676548239998383!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc48415d0d0813%3A0x18da7cf117e6d86c!2sBukit%20Tunku%2C%2050480%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705125507206!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'KL City Centre'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15935.209238200889!2d101.68824422597898!3d3.146805924764716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc49d3e30988d7%3A0x464a4b7fda23c09a!2sKuala%20Lumpur%20City%20Centre%2C%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705128948992!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Kepong'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.540181886025!2d101.63177092363567!3d3.214648402749299!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc466a34707273%3A0xb021481d9a3b6963!2sKepong%2C%2052100%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705128970214!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Jalan Kuching'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.5944421627282!2d101.66756727363567!3d3.200722952836235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc486cf9a4f017%3A0x91d76789adcf9df5!2sJln%20Kuching%2C%20Kuala%20Lumpur%2C%20Wilayah%20Persekutuan%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705128999039!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Seputeh'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31871.38482195341!2d101.64274170301!3d3.115046109312459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4a275bb7fccd%3A0xf343295489c1ac80!2sSeputeh%2C%2058000%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129021540!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Mont Kiara'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15934.849665914311!2d101.6403210759795!3d3.170234973904981!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc48f36948d5b5%3A0x8d7d68159672e98!2sMont%20Kiara%2C%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129037158!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Cheras'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15935.824301827584!2d101.71453012597819!3d3.1063203262419483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc35e14ef16f6d%3A0xff7e4ae6fc0089ff!2sCheras%2C%2056000%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129058785!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Sentul'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63737.51415258045!2d101.64127080437288!3d3.200673474090841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc47dd35cd8765%3A0x26009ee18dc42258!2sSentul%2C%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129074364!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Desa Petaling'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15936.167390627053!2d101.70022912597776!3d3.0835063270697276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc3588924f082d%3A0xa3dbf127a6e27020!2sDesa%20Petaling%2C%2057100%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129096705!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Pantai'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7967.875747761901!2d101.6552065358473!3d3.111140150528339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4bd538e29d37%3A0x21af2ea04f2e6acf!2sPantai%20Dalam%2C%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129225247!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Old Klang Road'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.9871422547944!2d101.67329157363562!3d3.098076453467264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4a30fc567561%3A0x6b2c6af57e6450b6!2sOld%20Klang%20Rd%2C%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129253665!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Dutamas'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31869.49574642498!2d101.62460905310542!3d3.176836244028708!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc486206cdf299%3A0x49868332054337ff!2sDutamas%2C%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129273116!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Kampung Kerinchi - Bangsar South'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.931321725022!2d101.66380217363559!3d3.1128733533773563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4a2c83003afb%3A0x7b0349ef36a9b1e7!2sKerinchi%2C%2059200%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129301091!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Desa Parkcity'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31869.232175721263!2d101.59508915311882!3d3.185362241916143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc48a5d32f5fb7%3A0x1fbfb9bf04283220!2sDesa%20Parkcity%2C%2052200%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129326323!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Bangsar'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15935.480252505795!2d101.66948402597866!3d3.1290313254145663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc499437d78c81%3A0x56b45ebf1e8941b4!2sBangsar%2C%2059000%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129348804!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Wangsa Maju'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15934.396530013186!2d101.72971982598011!3d3.199516372825525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc38253567068d%3A0xb73ce055457b55c0!2sWangsa%20Maju%2C%2053300%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129396040!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Sungai Besi'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31873.137855468212!2d101.69781421891696!3d3.056589707874923!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc356604124287%3A0x4351bb5e1ae9d0d4!2sSungai%20Besi%2C%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129422742!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Sri Petaling'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15936.38189820645!2d101.68002187597747!3d3.069156377588654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4a895d7a9a63%3A0x7051c2ebeda81fa9!2sBandar%20Baru%20Sri%20Petaling%2C%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129443786!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Segambut'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7967.255712989796!2d101.66909443584774!3d3.1921172493695362!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc47d86b0ce6d3%3A0xb4171ab27cc7f4dc!2sSegambut%2C%2051200%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129463300!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Salak South'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15935.830828728098!2d101.69692882597819!3d3.1058878762576683!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4a01a660bb53%3A0x4e3021b9e70922a5!2sSalak%20South%2C%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129479891!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Desa Pandan'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7967.5911121509735!2d101.7302566358476!3d3.1485721499953354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc364cff5707c3%3A0x8f663981fbfdfa7e!2sDesa%20Pandan%2C%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129506570!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Taman Desa'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15935.870722758918!2d101.67452312597813!3d3.103243326353786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4a1811c4e35d%3A0xa49de52e922a0721!2sTaman%20Desa%2C%2058100%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129527963!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Jalan Ipoh'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7967.360140838292!2d101.67892468584766!3d3.178623199564141!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4814bedaa94b%3A0xf2b93d7dfc7cef30!2sJalan%20Ipoh%2C%2051200%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129548276!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Sri Hartamas'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15935.006666990254!2d101.64252377597929!3d3.160026424280023!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc48fa0c4a3261%3A0x3c1197283baa60ab!2sSri%20Hartamas%2C%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129573834!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Kuchai Lama'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15936.15979354809!2d101.67620922597777!3d3.08401332705136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4a46c1cb4cf1%3A0x26fd121ec4b9ef00!2sKuchai%20Lama%2C%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129590395!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Jinjang'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15934.216834749866!2d101.63200322598037!3d3.211054322398654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc463f62525a97%3A0x1a6fe005f208b97f!2sJinjang%2C%20Metro%20Prima%2C%2052100%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129621953!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Taman Tun Dr Ismail'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31870.436663348628!2d101.58772720305782!3d3.146211151609656!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc492f22896851%3A0x7c3f0578b8a4cc30!2sTaman%20Tun%20Dr%20Ismail%2C%2060000%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129644147!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Setiawangsa'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15934.617471049956!2d101.73616377597983!3d3.1852728733513045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc3786ad4a98bf%3A0x460f2a8f1d6077f5!2sSetiawangsa%2C%2054200%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129662590!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Damansara Heights'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31870.23647805035!2d101.64081426892454!3d3.1527516977951815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc48557f0686f1%3A0x3fa67a7ab8462ebf!2sBukit%20Damansara%2C%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129695316!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Keramat'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15934.886007723482!2d101.71418412597947!3d3.167874873991755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc37c17b6d587f%3A0x2b0404225dd3e664!2sKampung%20Datuk%20Keramat%2C%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129714563!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'KL Sentral'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7967.704986803966!2d101.6773634198114!3d3.1336502723929964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc49c052793f51%3A0x118066eb8a4410f5!2sKuala%20Lumpur%20Sentral%2C%2050470%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129880369!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Titiwangsa'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15934.731385106086!2d101.68831782711156!3d3.1779042107867457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc481d86061a13%3A0x1c9ec348e4434670!2sTitiwangsa%2C%2053200%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129897785!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Puchong'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.1187372582162!2d101.64525007363552!3d3.062910653679499!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4b0e862e7c75%3A0xe1da76fba51cd601!2sJalan%20Puchong%2C%20Kuala%20Lumpur%2C%20Wilayah%20Persekutuan%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129960588!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Mid Valley City'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.9113388784153!2d101.67450312363563!3d3.1181533533451926!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc498e513bd64b%3A0x6c46e140f090d7b9!2sMid%20Valley%20City%2C%2058000%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705129975819!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Hulu Kelang'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15934.712664080547!2d101.75739272597967!3d3.179116373578153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc376f6c801f33%3A0xa5593a7652b1e08c!2sUlu%20Kelang%2C%2068000%20Ampang%20Jaya%2C%20Selangor!5e0!3m2!1sen!2smy!4v1705130029388!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else if($rows['area'] == 'Sunway SPK'){?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7967.300258029411!2d101.61205936981642!3d3.1863681711693923!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc48ac03ad5609%3A0xa79292fbd3d6bc3a!2sSunway%20Spk%20Damansara%2C%2052200%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705130075580!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} else  { #sungai penchala?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15934.95179709823!2d101.61354667597938!3d3.1635979241488954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc48c5191cc48f%3A0xaab06f749e5ad9b!2sSungai%20Penchala%2C%2060000%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1705130094116!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php ;} ?>
    
            <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15934.900248094451!2d101.74163246747894!3d3.166949600554501!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc37a1397122b9%3A0xe074f5244e6f3cec!2sAmpang%2C%20Kuala%20Lumpur%2C%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1703336655043!5m2!1sen!2smy" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
          </div>
          <div class="col-lg-7 pt-5 pt-lg-0" style="border:5px solid white;border-top-color:#eb5d1e;">
            <h3 data-aos="fade-up" >≈ <?php $formatted_output = number_format($rows['price'], 2, '.', ',');
                echo "RM " . $formatted_output; ?></h3>
            <div style="font-weight:bold;font-size:20px; margin-top:10px;display:inline;">Area:</div>
            <div style="font-size:15px; margin-top:10px;display:inline-block;width:85%; text-align:right;"><?php echo $rows['area']; ?></div>
            <div style="font-weight:bold;font-size:20px; margin-top:10px;display:inline;">Building Area:</div>
            <div style="font-size:15px; margin-top:10px;display:inline-block;width:62%; text-align:right;"><?php echo $rows['buildingType']; ?></div>
            <div style="font-weight:bold;font-size:20px; margin-top:10px;display:inline;">Living Area:</div>
            <div style="font-size:15px; margin-top:10px;display:inline-block;width:68%; text-align:right;"><?php echo $rows['size']; ?></div>
            <div style="font-weight:bold;font-size:20px; margin-top:10px;display:inline;">Floors:</div>
            <div style="font-size:15px; margin-top:10px;display:inline-block;width:81%; text-align:right;"><?php echo $rows['floor']; ?></div>
            <div style="font-weight:bold;font-size:20px; margin-top:10px;display:inline;">Rating:</div>
            <div style="font-size:15px; margin-top:10px;display:inline-block;width:80%; text-align:right;"><?php if (is_null($rows['rating'])){ echo "Not Rated";}else{echo $rows['rating'];} ?></div>
            <div style="font-weight:bold;font-size:20px; margin-top:10px;display:inline;">Review:</div>
            <div style="font-size:15px; margin-top:10px;display:inline-block;width:78%; text-align:right;"><?php if (is_null($rows['review'])){ echo "Not Reviewed";}else{echo $rows['review'];}?></div>
          </div>
        </div>        
      </div>
    </section>
    <?php } $connection -> close();?>
    <?php ; } else {?>
      <div>
      <h1 style = "font-weight:bold;text-align: center; margin-top:200px;">Please Log In to View Your Saved Prediction</h1>
      </div>
      <div class="button-container" style = "left:50%; margin-bottom:200px; width:max-content;">
        <div class="button-tile">
          <a href="userLogin.php">Continue</a>
        </div>
     </div>
    <?php }?>

    <!-- End About Section -->

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
      <?php 
      if ($_SESSION['sucess'] == '0') { ?>
        allStar.forEach((item, idx)=> {
        item.addEventListener('click', function () {
        let click = 0
        ratingValue.value = idx + 1

        allStar.forEach(i=> {
        i.classList.replace('bxs-star', 'bx-star')
        i.classList.remove('active')})
        for(let i=0; i<allStar.length; i++) {
          if(i <= idx){
            allStar[i].classList.replace('bx-star', 'bxs-star')
            allStar[i].classList.add('active')
          }else {
            allStar[i].style.setProperty('--i', click)
            click++
          }} 
          })
        })
        <?php ;}?>
      <?php if ($_SESSION['sucess'] == '1') { ?>
        document.getElementById("js").value = "<?php echo $_SESSION['review']; ?>";
        allStar.forEach((item, idx)=> {
        window.addEventListener('load', function () {
          for(let i=0; i< <?php echo $_SESSION['rating']; ?>; i++) {
              allStar[i].classList.replace('bx-star', 'bxs-star')
              allStar[i].classList.add('active')
          }})}) <?php ;} ?>
    </script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets2/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets2/js/main.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>