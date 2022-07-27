<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<!-- <h1 class="page-header">Dashboard</h1> -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Admin Dashboard

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->



<div class="row" ><!-- 3 row Starts -->

<div class="col-lg-12" ><!-- col-lg-8 Starts -->

<div class="panel panel-primary" ><!-- panel panel-primary Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i></i> New Orders

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>
<th>Order #</th>
<th>Customer</th>
<th>Invoice No</th>
<th>order date</th>
<th>Total</th>
<th>Products</th>
</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php

$i = 0;

$get_order = "select * from pending_orders group by invoice_no ";
$run_order = mysqli_query($con,$get_order);

while($row_order=mysqli_fetch_array($run_order)){

$order_id = $row_order['order_id'];

$c_id = $row_order['customer_id'];

$invoice_no = $row_order['invoice_no'];

$total=$row_order['price'];
$order_date=$row_order['orderDate'];


$i++;

?>

<tr>

<td><?php echo $i; ?></td>

<td>
<?php
    $get_customer = "select * from customers where customer_id='$c_id' ";
    $run_customer = mysqli_query($con,$get_customer);
    $row_customer = mysqli_fetch_array($run_customer);
    $customer_email = $row_customer['customer_email'];
    echo $customer_email;
    
?>
</td>

<td><?php echo $invoice_no; ?></td>
<td>
<?php echo $order_date?>
</td>
<td>
<?php echo $total . " JD"?>
</td>
<td>

    <?php
$get_pro = "select DISTINCT *   from customer_products where customerID='$c_id' group by customerID ";
$run_pro = mysqli_query($con,$get_pro);
while($row_pro=mysqli_fetch_array($run_pro)){
    $customer_pro = $row_pro['productTitle'];
    //  $customer_proQ = $row_pro['quantity'];

echo '[' .$customer_pro.' ' .']'.'<br>'.'<br>';
}
    ?>


</td>

</tr>

<?php }

?>

</tbody><!-- tbody Ends -->


</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->




</div><!-- panel-body Ends -->

</div><!-- panel panel-primary Ends -->

</div><!-- col-lg-8 Ends -->

<div class="col-md-4"><!-- col-md-4 Starts -->

<div class="panel"><!-- panel Starts -->



</div><!-- panel Ends -->

</div><!-- col-md-4 Ends -->

</div><!-- 3 row Ends -->

<?php } ?>