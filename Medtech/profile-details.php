<?php

session_start();
include_once('includes/header.php');
require_once("includes/config.php");


?>
<section class="page-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="content">
          <h1 class="page-name">My Profile</h1>
          <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">my profile</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="user-dashboard page-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="list-inline dashboard-menu text-center">

        
        <li><a class="active" href="orders.php">Orders</a></li>
          <li><a class="active" href="profile-details.php">Profile Details</a></li>
        </ul>
        <div class="dashboard-wrapper dashboard-user-profile">
          <div class="media">
            <div class="pull-left text-center" href="#!">
              <img class="media-object user-img" src="images/team/team-1.jpg" alt="Image">
              <a href="#x" class="btn btn-transparent mt-20">Change Image</a>
            </div>
            <div class="media-body">
              <ul class="user-profile-list">

                <!-- update user info -->
                <!-- start of the form -->




                <form action="updateUser.php" method="Post">
                  <div class="form-row">

                    <?php


                    
                    if (!isset($_SESSION['loggedIn'])) {
                      echo "<br>";
                      echo "<h1>" . "You Are Not logged In!" . "</h1>";
                    } else {
                      $current = $_SESSION['loggedIn'];
                      $view = "SELECT * FROM customers WHERE customer_id ='$current' ";

                      $getresults = mysqli_query($conn, $view);


                      if ($getresults) {
                        if (mysqli_num_rows($getresults) > 0) {

                          while ($row = mysqli_fetch_array($getresults)) {


                    ?>

                            <div class="form-group col-md-6">
                              <label for="Name">FullName:</label>
                              <input type="text" class="form-control" name="fullname" placeholder="Full Name" value="<?php echo $row['customer_name'] ?>" disabled>
                            </div>


                            <input type="hidden" name="ID" value="<?php echo $row['customer_id'] ?>">

                            <div class="form-group col-md-6">
                              <label for="inputEmail4">Email</label>
                              <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $row['customer_email'] ?>" disabled>
                            </div>

                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Apartment, studio, or floor" value="<?php echo $row['customer_address'] ?>" disabled>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputCity">City</label>
                      <input type="text" class="form-control" name="city" placeholder="city" value="<?php echo $row['customer_city'] ?>" disabled>
                    </div>

                    <a href="updateUser.php?id=<?php echo $row['customer_id']; ?>" style="margin-left:15px;" type="submit" name="button" class="btn btn-main btn-large btn-round">Edit your Info</a>
                    <!-- <button style="margin-left:15px;" type="submit" name="button" class="btn btn-main btn-large btn-round">Edit your Info</button> -->
                  </div>
          <?php
                          }
                        }
                      }
                    }
          ?>


                </form>

                <!-- update user info -->
                <!-- start of the form -->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include_once('includes/footer.php') ?>
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