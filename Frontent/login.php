<?php
session_start();
$wrongInfo = false;
$conn = oci_connect('IPFT', 'IPFT', 'localhost/xe')
  or die(oci_error());

if (!$conn) {
  echo "not connected";
} else {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["submit"])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      
      $_SESSION['uname']= $password;

      $sql = "select * from soldier where lower(name)=lower('$username') and SOLDIER_NO='$password'";
      $stid = oci_parse($conn, $sql);
      $r = oci_execute($stid);
      $row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);
      echo $username;
      if ($row == NULL) {
        $sql = "select * from officer where lower(name)=lower('$username') and BA_NO='$password' ";
        $stid = oci_parse($conn, $sql);
        $r = oci_execute($stid);
        $row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);
        if ($row != NULL) {
          header("Location: officer.php");
        } else {
          $wrongInfo = true;
        }
      } else {
        header("Location: soldier.php");
      }
    }
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>IPFT - Management System</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon" />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top aaa">
    <div class="container d-flex align-items-center justify-content-lg-between">
      <h1 class="logo me-auto me-lg-0">
        <a href="index.html">IPFT<span>.</span></a>
      </h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <!-- <li><a class="nav-link" href="index.html">Home</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#about">About</a></li>
            <li><a class="nav-link scrollto" href="#services">Services</a></li>
            <li>
              <a class="nav-link scrollto" href="#portfolio">Portfolio</a>
            </li>
            <li><a class="nav-link scrollto" href="#team">Team</a></li>
            <li class="dropdown">
              <a href="#"
                ><span>Drop Down</span> <i class="bi bi-chevron-down"></i
              ></a>
              <ul>
                <li><a href="#">Drop Down 1</a></li>
                <li class="dropdown">
                  <a href="#"
                    ><span>Deep Drop Down</span>
                    <i class="bi bi-chevron-right"></i
                  ></a>
                  <ul>
                    <li><a href="#">Deep Drop Down 1</a></li>
                    <li><a href="#">Deep Drop Down 2</a></li>
                    <li><a href="#">Deep Drop Down 3</a></li>
                    <li><a href="#">Deep Drop Down 4</a></li>
                    <li><a href="#">Deep Drop Down 5</a></li>
                  </ul>
                </li>
                <li><a href="#">Drop Down 2</a></li>
                <li><a href="#">Drop Down 3</a></li>
                <li><a href="#">Drop Down 4</a></li>
              </ul>
            </li>
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->

      <!-- <a href="login.html" class="get-started-btn scrollto">Login</a> -->
    </div>
  </header>
  <!-- End Header -->
  <main id="main">
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact mt-5">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>IPFT</h2>
          <p>LOG IN</p>
        </div>


        <div class="row mt-5">


          <div class="col-lg-12 mt-5 mt-lg-0">
            <form action="login.php" method="post" role="form" >   <!-- class="php-email-form" -->
              <div class="text-center form-group mt-3">
                <input type="text" class="form-control" name="username" id="username" placeholder="username" required >
              </div>
              <div class="text-center form-group mt-3">
                <input type="text" class="form-control" name="password" id="password" placeholder="password" required >
              </div>

              <!-- <div class="text-center">
                  <button type="submit">Login</button>
                </div> -->
                <!-- <div class="text-center"><button type="submit" class="btn btn-primary btn-block">Login</button></div> -->
              <div class="text-center"><input class="mt-3"  type="submit" name="submit"></div>
                
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- End Contact Section -->
  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>IPFT</span></strong
          >. All Rights Reserved
        </div>
        <div class="credits">
          Designed for <a href="">Databaes Management system project</a>
        </div>
      </div>
    </footer>
  <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
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