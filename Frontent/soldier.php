<?php
session_start();
$soldier_no = $_SESSION['uname'];
$conn = oci_connect('IPFT', 'IPFT', 'localhost/xe')
    or die(oci_error());

if (!$conn) {
    echo "not connected";
} else {
    $sql = "select * from soldier where SOLDIER_NO='$soldier_no' ";
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
                    <h2>SOLDIER</h2>
                    <p>SOLDIER <?php echo $row["NAME"] ?></p>
                </div>

                <!--<div class="row mt-5">
                    <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
                         <div class="col-xl-4 col-md-4 border border-success">
                            <a href=""><div class="icon-box">
                                <span class="iconify" data-icon="openmoji:military-medal"></span>
                                <h3>Add Officer</h3>
                            </div></a>
                        </div>
                        <div class="col-xl-4 col-md-4 border border-success">
                            <a href=""><div class="icon-box">
                                <span class="iconify" data-icon="twemoji:military-helmet"></span>
                                <h3>Add Soldier</h3>
                            </div></a>
                        </div>
                        <div class="col-xl-4 col-md-4 border border-success">
                            <a href=""><div class="icon-box">
                                <span class="iconify" data-icon="carbon:navaid-military"></span>
                                <h3>Take Exam </h3>
                            </div></a>
                        </div>
                        <div class="col-xl-6 col-md-4 border border-success">
                            <a href=""><div class="icon-box">
                                <span class="iconify" data-icon="carbon:military-camp"></span>
                                <h3>Search Officer or Soldier</h3>
                            </div></a>
                        </div> 
                        
                        <div class="col-xl-6 col-md-4 border border-success">
                            <a href=""><div class="icon-box">
                                <span class="iconify" data-icon="carbon:pcn-military"></span>
                                <h3>See Result</h3>
                            </div></a>
                        </div>
                    </div>
                </div>-->
                <div class="text-center col-xl-12 col-md-12 border border-success">
                    <div class="icon-box">
                        <!-- <span class="iconify" data-icon="carbon:pcn-military"></span> -->
                        <h3>See Result</h3>

                    </div>
                </div>
                <div class="container">
                    <div class="row pt-4">
                        <form action="soldier.php" method="post">
                            <!--class="php-email-form"-->
                            <div class="form-group">
                                <select class="form-select" aria-label="Default select example" name="product">
                                    <option selected value="nai">Select Date</option>
                                    <?php

                                    $sql = "select * from TOTAL_RESULT where SOLDIER_NO='$soldier_no'";
                                    $stid = oci_parse($conn, $sql);
                                    oci_execute($stid);
                                    while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
                                        $biannual_d = $row['BIANNUAL_DATE'];
                                        // $prodlower = strtolower($prod);
                                        echo "<option value='$biannual_d'>$biannual_d</option>";
                                        // echo "<option value='$biannual_d'>$biannual_d</option>";
                                    }
                                    ?>
                                </select>
                                <!-- <input type="text" name="amount" class="form-control" id="amount" placeholder="Enter amount"> -->
                            </div>
                            <!-- <div class="form-group mt-3">
                                <input type="text" name="amount" class="form-control" id="amount" placeholder="Enter amount">
                            </div> -->

                            <!-- <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your Result is !</div>
                            </div> -->
                            <div class="text-center pt-3">
                                <!-- <button type="submit" name="submit" type="submit" value="submit">Submit</button> -->
                                <input class="" type="submit" name="submit">
                                <!-- <input class="mt-3"  type="submit" name="submit"> -->
                            </div>
                        </form>
                        <div>
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                // echo $biannual_d;

                                // if ($_POST['submit'] == 'submit') {
                                if (isset($_POST["submit"])) {
                                    //   $amount = (int) ($_POST['amount']);
                                    //   $item = $_POST['product'];
                                    $biannual_d2 = $_POST["product"];
                                    if ($biannual_d2 != "nai") {

                                        //natural join FAILED_P_I natural join IPFT_INFO
                                        $sql1 = "select * from TOTAL_RESULT NATURAL JOIN IPFT_INFO 
                                                where soldier_no='$soldier_no' and BIANNUAL_DATE='$biannual_d2' ";
                                        // echo $biannual_d2;
                                        $stid1 = oci_parse($conn, $sql1);
                                        oci_execute($stid1);
                                        $raw = oci_fetch_array($stid1, OCI_ASSOC + OCI_RETURN_NULLS);
                                        // $sql = "update main_inventory set date_added = sysdate where lower(ITEM_NAME)=lower('$item')";
                                        // $stid1 = oci_parse($conn, $sql);
                                        // oci_execute($stid1);
                                        // echo var_dump($raw["RESULT"]);
                                        echo var_dump($raw['RESULT']);
                                        echo "<div class='container text-center pt-3'><h3> You have  " . $raw['RESULT'] . "ed in your " .
                                            $raw['BIANNUAL'] . " annual exam of " . $biannual_d2 . "</h3> 
                                            <br><br><h4><b>Failed Items</b></h4>
                                            <table class='table'>
                                            <thead>
                                                <tr>
                                                    <td><b>Soldier no</b></td>
                                                    <td><b>Exam</b></td>
                                                    <td><b>Item name</b></td>
                                                </tr>
                                            </thead>
                                            <tbody>";


                                        //   } TOTAL_RESULT NATURAL JOIN
                                        $sql2 = "select * from  IPFT_INFO natural join FAILED_P_I natural join ITEM_INFO
                                        where soldier_no='$soldier_no' and BIANNUAL_DATE='$biannual_d2' ";
                                        $stid2 = oci_parse($conn, $sql2);
                                        oci_execute($stid2);


                                        while ($rew = oci_fetch_array($stid2, OCI_ASSOC + OCI_RETURN_NULLS)) //= oci_fetch_array($stidd, OCI_ASSOC + OCI_RETURN_NULLS)
                                        {
                                            echo "<tr>
                                                        <td>" . $soldier_no . "</td>
                                                        <td>" . $rew["BIANNUAL"] . " annual</td>
                                                        <td>" . $rew["ITEM_NAME"] . "</td>

                                                  </tr>";
                                        }
                                        echo "</tbody>
                                        </table></div>";
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>

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