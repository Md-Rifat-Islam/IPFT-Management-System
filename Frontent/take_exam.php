<?php
session_start();
$ba_no = $_SESSION['uname'];
$conn = oci_connect('IPFT', 'IPFT', 'localhost/xe')
    or die(oci_error());

if (!$conn) {
    echo "not connected";
} else {
    $sql = "select * from officer where BA_NO='$ba_no' ";
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);
    $row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);
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

            <a href="login.php" class="get-started-btn scrollto">Log Out</a>
        </div>
    </header>
    <!-- End Header -->

    <main id="main">
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact mt-5">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2><a href="officer.php">OFFICER</a> ->Take Exam</h2>
                    <p>OFFICER <?php echo $row["NAME"] ?></p>
                </div>
                <!-- <div class="container  col-md-12"> -->


                <!-- <div class="row"> -->
                <!--<div class="col-md-2 text-center">
                                 <h4 class="">Appoint Officer</h4>
                                <input type="text" name="appoint_off">
                                 
                            </div>-->
                <form action="take_exam.php" method="post">
                    <div class="col-md-12 text-center">
                        <h4 class="">Search Soldier</h4>
                        <input type="text" name="soldier_id" placeholder="Search by Soldier no">
                        <h5 class="pt-2">Bi-annual</h5>
                        <input type="radio" name="biannual" value="FIRST">
                                    <label for="FIRST">FIRST</label>
                                    <input type="radio" name="biannual" value="SECOND">
                                    <label for="SECOND">SECOND</label><br>
                        <input type="submit" name="submit">
                    </div>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Soldier No</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Mobile no</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            if (isset($_POST["submit"])) {
                                $soldier_no = $_POST['soldier_id'];
                                $biannual=$_POST['biannual'];
                                $_SESSION['biannual']=$biannual;
                                
                                

                                $sql2 = "select * from SOLDIER where SOLDIER_NO='$soldier_no' ";

                                $stid2 = oci_parse($conn, $sql2);
                                oci_execute($stid2);
                                // $row2 = oci_fetch_array($stid2, OCI_ASSOC + OCI_RETURN_NULLS);
                                // if ($row2 == NULL) {
                                //     echo "<script>alert('InValid Soldier Number');</script>";
                                // } else {
                                //     header("Location: take_exam_o.php");
                                // }
                                $_SESSION['soldier_no'] = $soldier_no;
                                while ($row2 = oci_fetch_array($stid2, OCI_ASSOC + OCI_RETURN_NULLS)) {
                                    echo "
                                            <tr>
                                                <td>" . $row2["NAME"] . "</td>
                                                <td>" . $row2["SOLDIER_NO"] . "</td>
                                                <td>" . $row2["GENDER"] . "</td>
                                                <td>" . $row2["AGE"] . "</td>
                                                <td>" . $row2["CELL_NO"] . "</td>
                                            </tr>";
                                }
                            }
                        }
                        ?>

                    </tbody>
                </table>
                <div class="text-center">
                    <button><a href="take_exam_o.php">Continue</a></button>
                </div>

                <!-- </div> -->


                <h3 class="pt-3 text-center">Required BenchMark</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>A16KM</th>
                            <th>PUSH_UP</th>
                            <th>BEAM</th>
                        
                            <th>HORIZONTAL_ROPE</th>
                            <th>A32KM</th>
                            <th>SWIMMING</th>
                        
                            <th>A6FT_WALL</th>
                            <th>REACH_UP</th>
                            <th>SIT_UP</th>
                        </tr> 
                    </thead>
                    <tbody>

                    </tbody>
                </table>

                <!-- </div> -->
        </section>
        <!-- End Contact Section -->
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>IPFT</span></strong>. All Rights Reserved
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

    <!-- icon js  -->
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
</body>

</html>