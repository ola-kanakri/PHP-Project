<?php
include("connection.php");

session_reset();
@$WelcomeMsg = $_SESSION['loggedName'];
$get_cats = "select * from categories";

$run_cats = mysqli_query($con, $get_cats);

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Medtech</title>

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Construction Html5 Template">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
	<meta name="author" content="Themefisher">
	<meta name="generator" content="Themefisher Constra HTML Template v1.0">
	<script src="https://kit.fontawesome.com/5a3ad4e25b.js" crossorigin="anonymous"></script>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="images/new/icon.png" />

	<!-- Themefisher Icon font -->
	<link rel="stylesheet" href="plugins/themefisher-font/style.css">
	<!-- bootstrap.min css -->
	<link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">

	<!-- Animate css -->
	<link rel="stylesheet" href="plugins/animate/animate.css">
	<!-- Slick Carousel -->
	<link rel="stylesheet" href="plugins/slick/slick.css">
	<link rel="stylesheet" href="plugins/slick/slick-theme.css">

	<!-- Main Stylesheet -->
	<link rel="stylesheet" href="css/style.css">

</head>

<body id="body">

	<section class="top-header">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-12 col-sm-4 h1">
					<div class="contact-number h1 ">
						<?php
						if (!isset($_SESSION['loggedIn'])) { ?>
							<div class="contact-number">
								<i class="tf-ion-ios-telephone" style="font-size:20px ;"></i>
								<span style="font-size:14px ;">+0129- 12323-123123</span>
							</div>
						<?php
						} else { ?>
							<h4>Welcome <?php echo '<span style="color:#1BB2FB;"> ' . strtoupper($WelcomeMsg)  . '!</span>'; ?></h4>

						<?php
						}

						?>


					</div>
				</div>
				<div class="col-md-4 col-xs-12 col-sm-4">
					<!-- Site Logo -->
					<div class="logo text-center">
						<a href="index.php">
							<!-- replace logo here -->
							<img class="img-responsive" src="images/new/1.jpeg" alt="menu image" style="width: 340px; height:100px;" />
						</a>
					</div>
				</div>
				<div class="col-md-4 col-xs-12 col-sm-4 h1">

					<!-- Cart -->
					<ul class="top-menu text-right list-inline">
						<li class="dropdown cart-nav dropdown-slide">
							<a  href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i style="font-size: 23px; margin-left:100px;" class="tf-ion-android-cart"></i></a>
							<div class="dropdown-menu cart-dropdown">
								<!-- Cart Item -->

								<!-- / Cart Item -->

								<div class="cart-summary">
									<span style="font-size:20px ;">Total</span>
									<span class="total-price"> <?php echo @$_SESSION['Total_Price'] . ".00jd"; ?></span>
								</div>
								<ul class="text-center cart-buttons">
									<li><a href="cart.php" class="btn btn-small">View Cart</a></li>
									<li> <?php
											function check()
											{
												if (!isset($_SESSION['loggedIn'])) { ?>
												<script type="text/javascript">
													$(document).ready(function() {
														Swal.fire({
															title: '<strong> Are you <a href="login.php"><u>Logged In</u></a>?</strong>',
															icon: 'info',
															html: 'Please <b> login </b> To Proceed To CheckOut ',

															showCloseButton: true,

															focusConfirm: false,
															confirmButtonText: '<a href="login.php"><i class="fa fa-thumbs-up" style="color:white;"></i> OK!</a>',

															confirmButtonAriaLabel: 'Thumbs up, great!',

														})

													});
												</script><?php
														} else {
															header("Location: checkout.php");
														}
													}

													if (isset($_GET['name'])) {

														check();
													}
															?>

										<a href="cart.php?name=true" class="btn btn-small btn-solid-border">Checkout</a>
									</li>
								</ul>
							</div>

						</li><!-- / Cart -->

						<!-- Search -->
						<li class="dropdown search dropdown-slide">
							<?php
							if (!isset($_SESSION['loggedIn'])) {
							} else { ?>

								<a href="logout.php" data-toggle="tooltip" data-placement="bottom" title="logout">
									<i class="fa-solid fa-arrow-right-from-bracket" style="font-size: 20px;"></i></a>

							<?php } ?>
						</li><!-- / Search -->

						<!-- Languages -->


					</ul><!-- / .nav .navbar-nav .navbar-right -->
				</div>
			</div>
		</div>
	</section><!-- End Top Header Bar -->

	<!-- Main Menu Section -->
	<section class="menu">
		<nav class="navbar navigation">
			<div class="container">
				<div class="navbar-header">
					<h2 class="menu-title">Main Menu</h2>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

				</div><!-- / .navbar-header -->

				<!-- Navbar Links -->
				<div id="navbar" class="navbar-collapse collapse text-center">
					<ul class="nav navbar-nav">

						<!-- Home -->
						<li class="dropdown ">
							<a href="index.php">Home</a>
						</li><!-- / Home -->


						<!-- Elements -->
						<li class="dropdown dropdown-slide">
							<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Shop <span class="tf-ion-ios-arrow-down"></span></a>
							<div class="dropdown-menu" style="background-color: white;">
								<div class="row">

									<!-- Basic -->
									<div class="col-lg-12 col-md-6 mb-sm-3">
										<?php
										while ($row_cats = mysqli_fetch_array($run_cats)) {
											$cat_id = $row_cats['cat_id'];
											$cat_title = $row_cats['cat_title'];

											echo "
        
       
										<ul>

											<li><a href='products.php?cat=$cat_id'>$cat_title</a></li>

										</ul>";
										}
										?>
									</div>



									<!-- contact -->
						<li class="dropdown full-width">
							<a href="contact.php" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Contact Us <span c></span></a>

						</li><!-- / contact -->



						<!-- Blog -->
						<li>
							<a href="about.php" data-delay="350" aria-haspopup="true" aria-expanded="false">About <span></span></a>

						</li><!-- / Blog -->

						<!-- Shop -->
						<li class="dropdown dropdown-slide">
							<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="tf-ion-ios-arrow-down"></span></a>
							<ul class="dropdown-menu" style="background-color: white;">

								<?php
								if (!isset($_SESSION['loggedIn'])) {?>
								 <li><a href="login.php">login</a></li>
								 <li><a href="signup.php">Register</a></li>

								<?php } else { ?>
									<li><a href="logout.php">log-out</a></li>
									<li><a href="profile-details.php">My Profile</a></li>
								<?php
								}  ?>
								

							</ul>
						</li><!-- / Blog -->
					</ul><!-- / .nav .navbar-nav -->

				</div>
				<!--/.navbar-collapse -->
			</div><!-- / .container -->
		</nav>
	</section>
	