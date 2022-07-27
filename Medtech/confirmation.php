<?php 
session_start(); 
include_once('includes/header.php');
include("includes/connection.php");
$cid=$_SESSION['loggedIn'];
$invnum=rand();
$ttl=$_SESSION['Total_Price'];
$ww=$_SESSION['pit'];
// $qt= $_SESSION['qnty'];
if(isset($_GET['chkout']))
{
  $qur= "INSERT into `pending_orders` (customer_id,invoice_no,price) values ($cid,$invnum,$ttl) ";
  mysqli_query($con,$qur);

  $qur= "INSERT into `customer_products` (customerID,productTitle) values ($cid,'$ww') ";
  mysqli_query($con,$qur);

}

?>





<!-- Page Wrapper -->
<section class="page-wrapper success-msg">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
        	<i class="tf-ion-android-checkmark-circle" style="background-color:#1BB2FB"></i>
          <h2 class="text-center">Thank you For Trusting Medtech!</h2>
          <p>We’re so glad that you found what you were looking for.</p>
          <a href="products.php?cat=6" class="btn btn-main mt-20">Continue Shopping</a>
        </div>
      </div>
    </div>
  </div>
</section><!-- /.page-warpper -->

<?php  include_once('includes/footer.php') ?>
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