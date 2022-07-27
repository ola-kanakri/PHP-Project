
<?php  

session_start();

    include_once('includes/header.php') ;
	  include("includes/connection.php");
  	include("includes/functions.php");
    $get_cats = "select * from categories";
    $run_cats = mysqli_query($con,$get_cats);

?>

<div class="hero-slider">
  <div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/imageh.png);">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 text-center">
          <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">TOTAL HEALTH CARE SOLUTION</p>
          <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">Your Most Trusted <br>  Health Partner.</h1>
          <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="products.php?cat=7">Shop Now</a>
        </div>
      </div>
    </div>
  </div>
  <div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/slide2.png);">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 text-center">
          <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1" class="text-uppercase">Best Quality At Top Prices</p>
          <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">Safe And Profissional.</h1>
        
          <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="products.php?cat=6">Shop Now</a>
        </div>
      </div>
    </div>
  </div>
  <div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/hero-industry-medical-equipment.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 text-center">
          <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
          <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">Your supplier of medical <br>equipment and furniture </h1>
          <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="products.php?cat=6">Shop Now</a>
        </div>
      </div>
    </div>
  </div>
</div>

<section class='product-category section'>
	<div class='container'>
		<div class='row'>
			<div class="col-md-12">
				<div class='title text-center'>
					<h2>HAVE A LOOK AT OUR PRODUCTS</h2>
				</div>
			</div>
<?php  while($row_cats=mysqli_fetch_array($run_cats)){
        
        $cat_id = $row_cats['cat_id'];
        
        $cat_title = $row_cats['cat_title'];


        $cat_img = $row_cats['cat_image'];
        echo "
        
       
        <div class='col-md-6'>
				<div class='category-box'>
					<a href='products.php?cat=$cat_id'>
						<img src='../admin/other_images/$cat_img' alt='' />
						<div class='content' style='background-color: #ffffffdb;'>
							<h3>$cat_title</h3>
						</div>
					</a>	
				</div>
        </div>
    
    ";
    
}?>
    </div>
  </div>
</section>		 
						  	






<!--
Start Call To Action
==================================== -->
<section class="call-to-action bg-gray section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="title">
					<h2>Subscribe To Our Newsletter</h2>
					<p>Subscribe to our email newsletter today to receive updates on the latest news, tutorials and special offers!</p>
				</div>
        <form method="POST" action="index.php">
				<div class="col-lg-6 col-md-offset-3">
				    <div class="input-group subscription-form">
				      <input type="email" class="form-control" placeholder="Enter Your Email Address" name="eml">
				      <span class="input-group-btn">
				        <button class="btn btn-main" type="submit" style="background-color:#1BB2FB" name="emailsubmit">Subscribe Now!</button>
				      </span>
				    </div><!-- /input-group -->
			  </div><!-- /.col-lg-6 -->
</form>
<?php 
	include("includes/connection.php");

	if(isset($_POST['emailsubmit']))
	{
		//something was posted

    $eml = $_POST['eml'];
		if(!empty($eml))
		{
			//save to database
			$query = "INSERT INTO `subcribers`( `email`) VALUES ('$eml')";
			mysqli_query($con, $query);

      echo  "<br>" . "<br>"."<p style='color:#1BB2FB;'>You are now subscribed!</p>";
		}

	}

?>
			</div>
 
		</div> 		<!-- End row -->
    

	</div>   	<!-- End container -->
</section>   <!-- End section -->




<!-- coupon section -->
<section id="labels">
  <div class="container">
	<div class="row">
        <div class="col-sm-6 col-md-3">
          <div class="dl">
            <div class="brand">
                <h2>Over 100$ </h2>
            </div>
            <div class="discount alizarin">30%
                <div class="type">off</div>
            </div>
            <div class="descr">
                <strong>Get 30 percent off when you buy over $100</strong> 
            </div>
            <div class="ends">
                <small>* Conditions and restrictions apply.</small>
            </div>
            <div class="coupon midnight-blue">
                <a data-toggle="collapse" href="#code-1" class="open-code">Get a code</a>
                <div id="code-1" class="collapse code">LV5MAY14</div>
            </div>
          </div>
        </div>
        
        <div class="col-sm-6 col-md-3">
          <div  class="dl">
            <div class="brand">
                <h2>
                Over 50$ 
                </h2>
            </div>
            <div class="discount peter-river">
            15%
                <div class="type">
                    off
                </div>
            </div>
            <div class="descr">
                <strong>
                Get 15 percent off when you buy over $50. 
                </strong> 
            </div>
            <div class="ends">
                <small>
                   * Conditions and restrictions apply.
                </small>
            </div>
            <div class="coupon midnight-blue">
                <a data-toggle="collapse" href="#code-3" class="open-code">Get a code</a>
                <div id="code-3" class="collapse code">
                    OLV4SY3R
                </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-3">
          <div  class="dl">
            <div class="brand">
                <h2>Over 300$ </h2>
            </div>
            <div class="discount emerald">
                50%
                <div class="type">
                    off
                </div>
            </div>
            <div class="descr">
                <strong>
                Get 50 percent off when you buy over $300. 
                </strong> 
            </div>
            <div class="ends">
                <small>
                   * Conditions and restrictions apply.
                </small>
            </div>
            <div class="coupon midnight-blue">
                <a data-toggle="collapse" href="#code-2" class="open-code">Get a code</a>
                <div id="code-2" class="collapse code">
                    MNO123ST
                </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div  class="dl">
            <div class="brand">
                <h2>
                Over 75$ 
                </h2>
            </div>
            <div class="discount amethyst">
                25%
                <div class="type">
                    off
                </div>
            </div>
            <div class="descr">
                <strong>
                Get 25 percent off when you buy over $75. 
                </strong> 
            </div>
            <div class="ends">
                <small>
                   * Conditions and restrictions apply.
                </small>
            </div>
            <div class="coupon midnight-blue">
                <a data-toggle="collapse" href="#code-4" class="open-code">Get a code</a>
                <div id="code-4" class="collapse code">
                    ZUY4OPLQ
                </div>
            </div>
          </div>
        </div>
	</div>
  </div>
</section>
<!-- end of coupon section -->






<!--
Start Call To Action

==================================== -->
<div class="py-5 service-7" style="background-color:#f9f9f9; ">
    <div class="container">
        <!-- Row  -->
		<br><br>
        <div class="row">
            <!-- Column -->
            <div class="col-md-4 mb-4 text-center">
                <div class="">
                    <img class="rounded img-fluid" src="images/new/service1.png" alt="wrappixel kit" style="width: 100px; height:100px;"/><br><br>
                    <div class="mt-4">
                        <h4 class="font-weight-medium">WORLDWIDE SERVICE</h4>
                        <p class="mt-3">Over 1,000 medical and health care organizations attended in more than 149 countries.</p>
                        
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-4 mb-4 text-center">
                <div class="">
                    <img class="rounded img-fluid" src="images/new/ser2.png" alt="wrappixel kit" style="width: 100px; height:100px;"/><br><br>
                    <div class="mt-4">
                        <h4 class="font-weight-medium">CERTIFIED QUALITY</h4>
                        <p class="mt-3">Over 20 quality certifications and safety standards.</p><br>
                        
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-4 mb-4 text-center">
                <div class="">
                    <img class="rounded img-fluid" aria-hidden="true"></i><img src="images/new/ser3.png" alt="wrappixel kit" style="width: 100px; height:100px;"/><br><br>
                    <div class="mt-4">
                        <h4 class="font-weight-medium">EXPERIENCE
						</h4>
                        <p class="mt-3">Two decades focused on design, production and service, with 34 processes of quality control.</p>
                        
                    </div>
                </div>
            </div>
        </div>
		<br><br>
    </div>
</div>

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
