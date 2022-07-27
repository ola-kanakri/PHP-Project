
<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / Orders Status

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-truck"></i> Orders Status

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<div class="table-responsive"><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>#</th>
<th>order price  </th>
<th>invoice number  </th>
<th>order status</th>
<th>payment status </th>
<th>Delete  </th>
<th>Edit  </th>


</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php

$i = 0;
/*$get_order = "select * from pending_orders order by 1 DESC LIMIT 0,5";
$run_order = mysqli_query($con,$get_order);

while($row_order=mysqli_fetch_array($run_order)){



$c_id = $row_order['customer_id'];

$invoice_no = $row_order['invoice_no'];

$total=$row_order['price'];
$order_date=$row_order['orderDate'];

--
$coupon_limit = $row_coupons['coupon_limit'];

$coupon_used = $row_coupons['coupon_used'];
*/
$get_order = "select * from pending_orders";

$run = mysqli_query($con,$get_order);

while($row_orders = mysqli_fetch_array($run)){




$order_price = $row_orders['price'];

$invoice_no = $row_orders['invoice_no'];

$order_status = $row_orders['order_status'];

$order_payment = $row_orders['payment_status'];
$order_id = $row_orders['order_id'];





$i++;

?>

<tr>

<td><?php echo $i; ?></td>



<td><?php echo $order_price; ?></td>

<td><?php echo $invoice_no; ?></td>
<td><?php echo $order_status; ?></td>

<td><?php echo $order_payment; ?></td>


<td>

<a href="index.php?delete_order=<?php echo $order_id; ?>">

<i class="fa fa-trash-o"></i> Delete

</a>

</td>

<td>

<a href="index.php?edit_status=<?php echo $order_id; ?>">

<i class="fa fa-pencil"></i> Edit

</a>

</td>

</tr>

<?php } ?>

</tbody><!-- tbody Ends -->

</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php } ?>


