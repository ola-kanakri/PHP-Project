<?php



// Start connection with the database server
include 'includes/config.php';
session_start();
include_once('includes/header.php');

$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];

?>





<section class="page-header">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="content">
               <h1 class="page-name">Checkout</h1>
               <ol class="breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li class="active">checkout</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
</section>







<!-- Billing Address Form -->
<div class="page-wrapper">
   <div class="checkout shopping">
      <div class="container">
         <div class="row">

            <div class="col-md-8">
               <div class="block billing-details">
                  <h4 class="widget-title">Billing Details</h4>

                  <form class="checkout-form" action="confirmation.php" method='get'>
                     <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" class="form-control" id="full_name" placeholder="" required>
                     </div>
                     <div class="form-group">
                        <label for="user_address">Address</label>
                        <input type="text" class="form-control" id="user_address" placeholder="" required>
                     </div>
                     <div class="checkout-country-code clearfix">
                        <div class="form-group">
                           <label for="user_post_code">Zip Code</label>
                           <input type="text" class="form-control" id="user_post_code" name="zipcode" value="" required>
                        </div>
                        <div class="form-group">
                           <label for="user_city">City</label>
                           <input type="text" class="form-control" id="user_city" name="city" value="" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="user_country">Country</label>
                        <input type="text" class="form-control" id="user_country" placeholder="" required>
                     </div>
                     <input type='submit' name='chkout' class="btn btn-main mt-20" value='Place Order'>
                  </form>

               </div>





               <!-- Payment Method -->
               <div class="block">
                  <h4 class="widget-title">Payment Method</h4>
                  <p>Cash On Delivery</p>



                  </form>


                  <div class="checkout-product-details">
                     <div class="payment">

                     </div>
                  </div>
               </div>
            </div>





            <!-- Order Summary -->
            <div class="col-md-4">
               <div class="product-checkout-details">
                  <div class="block">
                     
            <form action="" method="post" >
                           <div class="form-group" >
                              <label>Have a discount ?  </label> <input style="height:37px;border: 1px lightgray solid" type="text" class="text" placeholder=" Enter Your Coupon" name="User_Copoun">

                              <input type='submit' name="Applys" class="btn btn-sm" value='Apply Coupon' style="border: 1px lightgray solid;">
                           </div>
                        </form>
                     <h4 class="discount-code">Order Summary</h4>

                     <?php
                       $w='';                  

                     // Query that select all content of the cart table joint with products table

                     $select_cart = mysqli_query($conn, "SELECT products.product_img1,products.product_title,products.product_price FROM `products` INNER JOIN `cart` ON cart.productID = products.product_id;");

                     //Select quantity from cart
                     $select_cart_quantity = mysqli_query($conn, "SELECT * FROM `cart`");
                     $grand_total = 0;

                     $cii=$_SESSION['loggedIn'];

                     if (mysqli_num_rows($select_cart) > 0) {
                        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                           $fetch_cart_quantity = mysqli_fetch_assoc($select_cart_quantity);
                           $e =$fetch_cart['product_title'];
                           $w .=  $e.'\n';
                         

                           // $_SESSION['qnty'].=$fetch_cart_quantity['quantity'];

                     ?>


                           <div class="media product-card">
                           


                              <div class="media-body">


                                 <!-- <p class="order-id">Invoice no.: </p> -->
                                 <p class="order-id">Product: <?php echo $fetch_cart['product_title']; ?></p>
                                 <p class="order-id"> Quantity: <?php echo $fetch_cart_quantity['quantity']; ?></p>
                                 <p class="order-id">Price: JOD <?php echo $sub_total = number_format($fetch_cart['product_price'] * $fetch_cart_quantity['quantity']); ?></p>
                                 <hr>
                                 <!-- <span class="remove" >Remove</span> -->
                              </div>
                           </div>
                           
                     <?php

                        };
                        $_SESSION['pit']=$w;


                        
                     };

                     ?>
                     <br><br> <b>
                        <p style="color-text:black;">Total Price: <?php echo $_SESSION['Total_Price'] ?> JOD </p>
                     </b>



                     <!-- Discount code -->
                     <div class="discount-code">
                        <!-- <p>Have a discount ? <a  data-target="#coupon-modal" href="#">enter it here</a></p> -->

                        

                        <?php

                        $Copoun_DB = mysqli_query($conn, "SELECT * FROM `coupons`");
                        $fetch_code = mysqli_fetch_assoc($Copoun_DB);


                        // if (mysqli_num_rows($Copoun_DB) > 0) {
                        // while ($fetch_code = mysqli_fetch_assoc($Copoun_DB)) {
                        // echo $fetch_code['coupon_code'];
                        if (isset($_POST['Applys'])) {

                           $User_Copoun = $_POST['User_Copoun'];

                           if ($User_Copoun === $fetch_code['coupon_code']) {

                              @$_SESSION['Total_Price'] = $_SESSION['Total_Price']   - ($_SESSION['Total_Price'] * $fetch_code['coupon_price']);
                              echo ' <label  style = "color:green">Copoun successfully applied.</label>';
                           } else {
                              echo '<div class="alert alert-danger" role="alert">
                                       Invalid Copoun.
                                    </div>';
                           }
                        }

                        ?>
                     </div>
                  </div>
               </div>



               <!-- Summary Prices -->
               <ul class="summary-prices" style="font-size:20px ;margin-left:20px">

                  <li>
                     <b><span>Shipping:</span></b>
                     <span> Free.</span>
                  </li>
               </ul>
               <div class="summary-total" style="font-size:20px; margin-left:20px">
                  <b><span>Total:</span></b>
                  <span><?php echo $_SESSION['Total_Price'] ?> JOD.</span>
               </div>

            </div>
         </div>
      </div>
   </div>
</div>
</div>
</div>
<!-- Modal -->

<div class="modal fade" id="coupon-modal" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-body">

            <form>
               <div class="form-group">
                  <input class="form-control" type="text" placeholder="Enter Coupon Code">
               </div>
               <button type="submit" class="btn btn-main">Apply Coupon</button>
            </form>

         </div>
      </div>
   </div>
</div>

<?php include_once('includes/footer.php'); ?>
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