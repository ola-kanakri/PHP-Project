<?php

 include("includes/db.php");

 if(!isset($_SESSION['admin_email'])){

 echo "<script>window.open('login.php','_self')</script>";

 }

 else {


?>

<?php

if(isset($_GET['edit_status'])){

$edit_id = $_GET['edit_status'];

$edit_status = "select * from pending_orders where order_id='$edit_id'";

$run_edit = mysqli_query($con,$edit_status);

$row_edit = mysqli_fetch_array($run_edit);

$c_id = $row_edit['order_id'];

$c_price = $row_edit['price'];

$c_code = $row_edit['invoice_no'];

$order_status = $row_edit['order_status'];

$order_payment = $row_edit['payment_status'];




}


?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Edit order status

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts --->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-truck"> </i> Edit Order status

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!--panel-body Starts -->

<form class="form-horizontal" method="post" action=""><!-- form-horizontal Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label"> Order status </label>

<div class="col-md-6">

<select name="status" class="form-control">
<option value="Preparing">Preparing</option>
<option value="Cancelled">Cancelled</option>
<option value="Shipping">Shipping</option>
<option value="Out for delivery">Out for delivery</option>
<option value="Delivered">Delivered</option>


</select>
</div>
<br><br>
<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label"> Payment status </label>

<div class="col-md-6">

<select name="payment" class="form-control">
<option value="Unpaid">Unpaid</option>
<option value="Paid">Paid</option>
</select>
</div>
</select>

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label"> </label>

<div class="col-md-6">

<input type="submit" name="update" class=" btn btn-primary form-control" value=" Confirm ">

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!--panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --->

<?php

if(isset($_POST['update'])){

 $order_status = $_POST['status'];

 $order_payment = $_POST['payment'];
$update_status = "UPDATE pending_orders set order_status='$order_status',payment_status='$order_payment' where order_id='$edit_id '";

$run_status = mysqli_query($con,$update_status);


if($run_status){

echo "<script>alert('One order Has Been Updated')</script>";

echo "<script>window.open('index.php?order_status','_self')</script>";

}}


}

?>

