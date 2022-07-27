<?php

session_start();
include("includes/db.php");
?>

<!DOCTYPE HTML>
<html  lang="en">

<head>

<meta charset="utf-8">
  <title>MedTech</title>
  <link rel="stylesheet" href="../Medtech/css/bootstrap.min.css" >
  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="../Medtech/images/new/icon.png" />

  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="../Medtech/plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="../Medtech/plugins/bootstrap/css/bootstrap.min.css">

  <!-- Animate css -->
  <link rel="stylesheet" href="../Medtech/plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="../Medtech/plugins/slick/slick.css">
  <link rel="stylesheet" href="../Medtech/plugins/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="../Medtech/css/style.css">


</head>

<body id="body">



    <section class="signin-page account">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="block text-center " style="border:2px solid #1BB2FB;background-color:white;border-radius: 25px;">
                        <a class="logo" href="index.php">
                            <img src="images/logo.png" alt="">
                        </a>
                        <img class="img-responsive" src="../Medtech/images/new/1.jpeg" alt="menu image" style="width: 340px; height:100px; margin-left:auto;margin-right:auto;" />
                        <h2 class="text-center" style="text-transform: capitalize;">Admin Login Dashboard</h2>

                        <form class="text-left clearfix" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" name="admin_email" placeholder="Email Address" required><br>

                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="admin_pass" placeholder="Password" required>
                            </div>
                            <div class="text-center">


                                <?php

                                if (isset($_POST['admin_login'])) {

                                    $admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);

                                    $admin_pass = mysqli_real_escape_string($con, $_POST['admin_pass']);

                                    $get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";

                                    $run_admin = mysqli_query($con, $get_admin);

                                    $count = mysqli_num_rows($run_admin);

                                    
                                    
                                    if ($count == 1) {

                                        $_SESSION['admin_email'] = $admin_email;

                                        

                                        echo "<script>window.open('index.php?dashboard','_self')</script>";
                                    } else {

                                        echo "<script>Swal.fire({
                                            icon: 'error',
                                            title:'ERROR!',
                                            text: 'Email or password wrong! Try Again!'
                                          })</script>";
                                    }
                                }

                                ?>


                                <button class="btn btn-main" id="button" type="submit" name="admin_login" style="background-color:#1BB2FB;font-size:13px;border-radius :5px;">Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 
    Essential Scripts
    =====================================-->

    <!-- Main jQuery -->
    <script src="plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Touchpin -->
    <script src="plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Instagram Feed Js -->
    <script src="plugins/instafeed/instafeed.min.js"></script>
    <!-- Video Lightbox Plugin -->
    <script src="plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
    <!-- Count Down Js -->
    <script src="plugins/syo-timer/build/jquery.syotimer.min.js"></script>

    <!-- slick Carousel -->
    <script src="plugins/slick/slick.min.js"></script>
    <script src="plugins/slick/slick-animation.min.js"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="plugins/google-map/gmap.js"></script>

    <!-- Main Js File -->
    <script src="js/script.js"></script>



</body>


</html>