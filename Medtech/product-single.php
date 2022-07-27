<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<?php

session_start();


include_once('includes/header.php');
include("includes/connection.php");


$Cid = $_GET['cat'];

$query = "SELECT * FROM  `products` p , `categories` c
          WHERE  p.`cat_id` = c.`cat_id`  AND p.`product_id`=" . $Cid;

$run_cat = mysqli_query($con, $query);


while ($row_cats = mysqli_fetch_array($run_cat)) {

	$cat_title = $row_cats['product_title'];
	$cat_desc = $row_cats['product_desc'];
	$cat_id = $row_cats['product_id'];

	$cat_img1 = $row_cats['product_img1'];
	$cat_img2 = $row_cats['product_img2'];
	$cat_img3 = $row_cats['product_img3'];
	$cat_price = $row_cats['product_price'];
}

?>
<?php
	
	include 'includes/connection.php';

	if (isset($_POST['post_comment'])) {

		$name = $_POST['name'];
		$message = $_POST['message'];
		
		
		$insert = "insert into comments (name,message) values ('$name','$message') ";

		if (mysqli_query($con, $insert)) {
		  echo "";
		} else {
		  echo "Error: " . $sql . "<br>" . $con->error;
		}
	}
?>




	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li><a href="products.php?cat=1">Shop</a></li>
					<li class="active">Single Product</li>
				</ol>
			</div>
			<div class="col-md-6">

			</div>
		</div>
		<div class="row mt-20">
			<div class="col-md-5">
				<div class="single-product-slider">
					<div id='carousel-custom' class='carousel slide' data-ride='carousel'>
						<div class='carousel-outer'>
							<!-- me art lab slider -->
							<div class='carousel-inner '>
								<div class='item active'>
									<img src='../admin/product_images/<?php echo $cat_img1 ?>' alt='' data-zoom-image="images/shop/single-products/product-1.jpg" />
								</div>
								<div class='item'>
									<img src='../admin/product_images/<?php echo $cat_img2 ?>' alt='' data-zoom-image="images/shop/single-products/product-2.jpg" />
								</div>

								<div class='item'>
									<img src='../admin/product_images/<?php echo $cat_img2 ?>' alt='' data-zoom-image="images/shop/single-products/product-3.jpg" />
								</div>


							</div>

							<!-- sag sol -->
							<a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
								<i class="tf-ion-ios-arrow-left"></i>
							</a>
							<a class='right carousel-control' href='#carousel-custom' data-slide='next'>
								<i class="tf-ion-ios-arrow-right"></i>
							</a>
						</div>

						<!-- thumb -->
						<ol class='carousel-indicators mCustomScrollbar meartlab'>
							<li data-target='#carousel-custom' data-slide-to='0' class='active'>
								<img src='images/shop/single-products/product-1.jpg' alt='' />
							</li>
							<li data-target='#carousel-custom' data-slide-to='1'>
								<img src='images/shop/single-products/product-2.jpg' alt='' />
							</li>
							<li data-target='#carousel-custom' data-slide-to='2'>
								<img src='images/shop/single-products/product-3.jpg' alt='' />
							</li>
							<li data-target='#carousel-custom' data-slide-to='3'>
								<img src='images/shop/single-products/product-4.jpg' alt='' />
							</li>
							<li data-target='#carousel-custom' data-slide-to='4'>
								<img src='images/shop/single-products/product-5.jpg' alt='' />
							</li>
							<li data-target='#carousel-custom' data-slide-to='5'>
								<img src='images/shop/single-products/product-6.jpg' alt='' />
							</li>
							<li data-target='#carousel-custom' data-slide-to='6'>
								<img src='images/shop/single-products/product-7.jpg' alt='' />
							</li>
						</ol>
					</div>
				</div>
			</div>

			<div class="col-md-7">
				<div class="single-product-details">
					<h2><?php echo $cat_title ?></h2>
					<p class="product-price"><?php echo $cat_price . ' ' . 'JD'; ?></p>

					<p class="product-description mt-20">
						<?php echo $cat_desc; ?>
					</p>


					<div class="product-quantity">
						<span>Quantity:</span>
						<div class="product-quantity-slider">
							<input id="product-quantity" type="number"   value="1" name="product-quantity">

						</div>
					</div>


					<form action='AddToCart.php' method='get'>
						<input type='hidden' name='p_id' value=<?php echo $cat_id; ?>>
					<!-- /*here*/ -->
						<br>

						<input type='submit' name="addtc" class="btn btn-main pull-left" value='add to cart'>
                    </form>


				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
				<div class="tabCommon mt-20">
					<ul class="nav nav-tabs">

						<li class=""><a data-toggle="tab" href="#reviews" aria-expanded="false">Reviews </a></li>
					</ul>
					<div class="tab-content patternbg">
						<div id="details" class="tab-pane fade active in">
							<div class="form-floating">
							<form action="" method="post" class="form">
                                <input type="text" name="name" placeholder="your name here" class="form-control mt-20">
								<textarea class="form-control mt-20" name="message" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
								<input type="submit" name="post_comment" class="btn btn-main mt-20">
								</form>
								<div class="content">
	
	</div>
	
							</div>
						</div>
						</ul>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>

	<br>
<?php

$sql = "SELECT * FROM comments";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $count=0;
  while($row = $result->fetch_assoc()) {
   
?>



<div class="container d-inline-flex p-2" style="background-color:white;">
<div class="card" style="border: 1px lightgray solid ; border-radius:10px ;padding: 20px;">
  <div class="card-body"><h4><?php echo $row['name']." said :"; ?></h4></div>
  <div class="card-body"><p><?php echo $row['message']; ?></p></div>
  <div class="card-footer" ><p style="color:#1BB2FB;"><?php echo "Data and time : ".$row['Submittime']; ?></p></div>
</div>
  </div><br>
  <!-- <script>
			Swal.fire({
			  title: 'Your comment was succssefully submitted',
			  showCancelButton: false,
			  confirmButtonText: 'OK',
			  confirmButtonColor: '#1BB2FB',
			  cancelButtonColor: '#ff0099',
			})</script> -->
			
<?php } }


?>

<!-- Modal -->
<div class="modal product-modal fade" id="product-modal">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<i class="tf-ion-close"></i>
	</button>
	<div class="modal-dialog " role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row">
					<div class="col-md-8">
						<div class="modal-image">
							<img class="img-responsive" src="images/shop/products/modal-product.jpg" />
						</div>
					</div>
					<div class="col-md-3">
						<div class="product-short-details">
							<h2 class="product-title">GM Pendant, Basalt Grey</h2>
							<p class="product-price">$200</p>
							<p class="product-short-description">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem iusto nihil cum. Illo laborum numquam rem aut officia dicta cumque.
							</p>
							<a href="#!" class="btn btn-main">Add To Cart</a>
							<a href="#!" class="btn btn-transparent">View Product Details</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  </div>
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

<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>


</body>

</html>