<?php
// Start User session
session_start();

// Start connection with the database server
include 'includes/config.php';


///////// When update button is clicked/////////////
if (isset($_POST['update_update_btn'])) {
  $update_value = $_POST['update_quantity'];
  $update_id = $_POST['update_quantity_id']; //update_quantity_id will take its value from the cart form 

  $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE cartID = '$update_id'");

  if ($update_quantity_query) {
    //Redirect to the same page(cart.php) after update
    header('location:cart.php');
  };
};


/////////// When rmove button is clicked  //////////////
if (isset($_GET['remove'])) {
  $remove_id = $_GET['remove'];
  mysqli_query($conn, "DELETE FROM `cart` WHERE cartID = '$remove_id'");
  header('location:cart.php');
};

/////////// when Delete all button is clicked /////////////
if (isset($_GET['delete_all'])) {
  //Redirect to the same page(cart.php) after delete
  mysqli_query($conn, "DELETE FROM `cart`");
  header('location:cart.php');
};


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>shopping cart</title>


  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <!-- custom css file link  -->
  <link rel="stylesheet" href="ecommerce-website-php/Medtech/css/cart_style.css">
  <link rel="shortcut icon" type="image/x-icon" href="images/new/icon.png">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>



</head>

<body>

  <!-- Include the navbar code -->
  <?php include 'includes/header.php'; ?>



  <section class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-md-offset-1">
          <div class="block">
            <div class="product-list">
              <div class="col-md-12">
                <div class="content">
                  <h1 class="page-name">Cart</h1>
                  <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">cart</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
  </section>




  <div class="page-wrapper">
    <div class="cart shopping">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="block">
              <div class="product-list">



                <table class="table">

                  <thead>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total price</th>
                    <th>Action</th>
                  </thead>



                  <tbody>
                    <?php
                    // Query that select all content of the cart table
                    //SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate FROM Orders INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID;
                    $select_cart = mysqli_query($conn, "SELECT products.product_img1,products.product_title,products.product_price FROM `products` INNER JOIN `cart` ON cart.productID = products.product_id;");
                    $select_cart_quantity = mysqli_query($conn, "SELECT * FROM `cart`");
                    $grand_total = 0;

                    if (mysqli_num_rows($select_cart) > 0) {
                      while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                        $fetch_cart_quantity = mysqli_fetch_assoc($select_cart_quantity);
                    ?>



                        <tr>
                          <td><img src="../admin/product_images/<?php echo $fetch_cart['product_img1']; ?>" height="100" alt=""></td>
                          <td><?php echo $fetch_cart['product_title']; ?></td>
                          <td>JOD <?php echo number_format($fetch_cart['product_price']); ?></td>

                          <td>
                            <form action="" method="post">
                              <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart_quantity['cartID']; ?>">
                              <input type="number" name="update_quantity" min="1" value="<?php echo $fetch_cart_quantity['quantity']; ?>">
                              <input type="submit" class='btn btn-main btn-small btn-round' value="CONFIRM"   style="background-color:black;" name="update_update_btn">
                              
                             
                            </form>

                          </td>


                          <td>JOD <?php echo $sub_total = number_format($fetch_cart['product_price'] * $fetch_cart_quantity['quantity']); ?>/-</td>





                          <td><a href="cart.php?remove=<?php echo $fetch_cart_quantity['cartID']; ?>" onclick="return confirm('Remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>



                        </tr>


                    <?php
                      @$grand_total = $grand_total + $sub_total;
                      };
                    };
                    ?>

                    <tr class="table-bottom">
                      <td><a href='products.php?cat=6' class="btn btn-main " style="margin-top:0;">Continue shopping</a></td>
                      <td colspan="3" style="font-size:20px"><b>Grand Total<b></td>
                      <td style="font-size:20px"><b>$<?php echo $grand_total; ?>/-<b></td>
                      <td><a href="cart.php?delete_all" onclick="return confirm('Are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> Delete all </a></td>
                    </tr>

                  </tbody>



                </table>


                <?php
                function checkRegister()
                {
                  if (!isset($_SESSION['loggedIn'])) { ?>
                    <script type="text/javascript">
                      $(document).ready(function() {
                        Swal.fire({
                          title: '<strong>You Are not <a href="login.php"><u>Logged In</u></a></strong>',
                          icon: 'info',
                          html: 'Please <b> login </b> To Proceed To CheckOut ',

                          showCloseButton: true,

                          focusConfirm: false,
                          confirmButtonText: '<a href="login.php"><i class="fa fa-thumbs-up" style="color:white;"> OK!</i></a>',

                          confirmButtonAriaLabel: 'Thumbs up, great!',

                        })

                      });
                    </script><?php
                            } else {
                              header("Location: checkout.php");
                            }
                          }




                          if (isset($_GET['name'])) {

                            checkRegister();
                          }
                              ?>

                <a href="cart.php?name=true" class="btn btn-main pull-right">Checkout</a>







              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  // For passing the total price to checkout page
  $_SESSION['Total_Price'] =  $grand_total;

  //  echo$_SESSION['Total_Price'];
  ?>


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

  <!-- custom js file link  -->
  <script src="/ecommerce-website-php/Medtech/js/script_cart.js"></script>


</body>

</html>