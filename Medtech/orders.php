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
					<h1 class="page-name">Dashboard</h1>
					<ol class="breadcrumb">
						<li><a href="index.html">Home</a></li>
						<li class="active">my account</li>
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
					<li><a href="profile-details.php">Profile Details</a></li>
				</ul>



<?php if(isset(	$_SESSION['loggedIn']))
{
?>
				<div class="dashboard-wrapper user-dashboard">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Order ID</th>
									<th>Date</th>
									<th>Invoice Number</th>
									<th>Total Price</th>
									
								</tr>
							</thead>
                            <?php 
}
else {echo 'you are not logged in';}
                 
                           @ $current =	$_SESSION['loggedIn'];
                            $view="SELECT * FROM pending_orders WHERE customer_id ='$current' ";
                       
                            $getresults=mysqli_query($conn,$view);
                            
                          
                            if($getresults){
                       
                             
                                 if(mysqli_num_rows($getresults)>0){
                                   
                                   while($row= mysqli_fetch_array($getresults)){
                                                
                                    $order_id = $row['order_id'];
                                    $order_date = $row['orderDate'];
                                    $invoice_no = $row['invoice_no'];
                                    $price = $row['price'];
                                       
                                     ?>
                            
                            
							<tbody>
								<tr>
									<td><?php echo $order_id ?></td>
									<td><?php echo $order_date ?></td>
									<td><?php echo $invoice_no ?></td>
									<td><?php echo $price ?></td>
									
								</tr>	
							</tbody>
                            <?php 
                                   }
                                }
                            }
                        ?>
						</table>
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