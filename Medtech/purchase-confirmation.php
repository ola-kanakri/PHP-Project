
<?php 
session_start(); include_once('includes/header.php') ?>
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Purchase Confirmation</h1>
					<ol class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li class="active">purchase confirmation</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>


<div class="page-wrapper">
  	<div class="purchase-confirmation shopping">
    	<div class="container">
      		<div class="row">
        		<div class="col-md-8 col-md-offset-2">
          			<div class="block ">
            			<div class="purchase-confirmation-details">
				            <table id="purchase-receipt" class="table">
				                <thead>
									<tr>
					                    <th><strong>Payment:</strong></th>
					                    <th></th>
				                  	</tr>
				                </thead>

				                <tbody>

				                  	<tr>
				                    	<td class=""><strong>Payment Status:</strong></td>
				                    	<td class=""></td>
				                  	</tr>


				                  	<tr>
				                    	<td><strong>Payment Method:</strong></td>
				                    	<td></td>
				                  	</tr>
				                  	<tr>
				                    	<td><strong>Date:</strong></td>
				                    	<td></td>
				                  	</tr>
				                  	<tr>
				                    	<td><strong>Subtotal</strong></td>
				                    	<td>
				                             </td>
				                    </tr>

				                    <tr>
				                      	<td><strong>Total Price:</strong></td>
				                      	<td></td>
				                    </tr>
				                </tbody>
				            </table>
              			</div>
            		</div>
          		</div>
        	</div>
      	</div>
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
