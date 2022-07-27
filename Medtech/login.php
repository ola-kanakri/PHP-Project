<?php

session_start();

include("includes/connection.php");
include("includes/functions.php");
?>



<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>MedTech</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">

  <!-- Animate css -->
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  <link rel="shortcut icon" type="image/x-icon" href="images/new/icon.png" />
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

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
            <img class="img-responsive" src="images/new/1.jpeg" alt="menu image" style="width: 340px; height:100px; margin-left:auto;margin-right:auto;" />
            <h2 class="text-center">Welcome Back</h2>

            <form class="text-left clearfix" method="POST">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="User name" name="user_name" required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
              </div>
              <div class="text-center">
                <?php







                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                  //something was posted
                  $user_name = $_POST['user_name'];
                  $password = $_POST['password'];

                  if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

                    //read from database
                    $query = "select * from customers where customer_name = '$user_name' limit 1";


                    $result = mysqli_query($con, $query);

                    

                    if ($result) {
                      if ($result && mysqli_num_rows($result) > 0) {

                        $user_data = mysqli_fetch_assoc($result);
                        $_SESSION['loggedIn'] = $user_data['customer_id'];
                        $_SESSION['loggedName'] = $user_data['customer_name'];

                        if ($user_data['customer_pass'] === $password && ($_SESSION['Total_Price'])>0) {

                          $_SESSION['user_id'] = $user_data['user_id'];
                          header("Location: cart.php");
                          die;
                        }
                        else if ($user_data['customer_pass'] === $password) {

                          $_SESSION['user_id'] = $user_data['user_id'];
                          header("Location: index.php");
                          die;
                        }
                      }
                    }

                    echo "Wrong Username Or Password!" . "<br>" . "<br>";
                    
                  } else {
                    echo "wrong username or password!";
                  }
                }
                
          

                ?>

                <input class="btn btn-main" name="btn" id="button" type="submit" value="Login" style="background-color:#1BB2FB;font-size:13px;border-radius :5px;">
              </div>
            </form>
            <p class="mt-20">New In This Site ?<a href="signup.php"> Create New Account</a></p>
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