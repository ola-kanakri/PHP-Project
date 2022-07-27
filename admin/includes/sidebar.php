<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {
?>

<nav class="navbar navbar-inverse navbar-fixed-top" ><!-- navbar navbar-inverse navbar-fixed-top Starts -->

<div class="navbar-header" ><!-- navbar-header Starts -->

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" ><!-- navbar-ex1-collapse Starts -->


<span class="sr-only" >Toggle Navigation</span>

<span class="icon-bar" ></span>

<span class="icon-bar" ></span>

<span class="icon-bar" ></span>


</button><!-- navbar-ex1-collapse Ends -->

<a class="navbar-brand" href="index.php?dashboard" >Med-Tech Ecommerce</a>


</div><!-- navbar-header Ends -->

<ul class="nav navbar-right top-nav" ><!-- nav navbar-right top-nav Starts -->

<li class="dropdown" ><!-- dropdown Starts -->

<a href="#" class="dropdown-toggle" data-toggle="dropdown" ><!-- dropdown-toggle Starts -->

<i class="fa fa-user" ></i>

<?php echo $admin_name; ?> <b class="caret" ></b>


</a><!-- dropdown-toggle Ends -->

<ul class="dropdown-menu" ><!-- dropdown-menu Starts -->

<li><!-- li Starts -->

<a href="index.php?user_profile=<?php echo $admin_id; ?>" >

<i class="fa fa-fw fa-user" ></i> Profile


</a>

</li><!-- li Ends -->


<li class="divider"></li>

<li><!-- li Starts -->

<a href="logout.php">

<i class="fa fa-fw fa-power-off"> </i> Log Out

</a>

</li><!-- li Ends -->

</ul><!-- dropdown-menu Ends -->




</li><!-- dropdown Ends -->


</ul><!-- nav navbar-right top-nav Ends -->

<div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse Starts -->

<ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav Starts -->

<li><!-- li Starts -->

<a href="index.php?dashboard">

<i class="fa fa-fw fa-dashboard"></i> Dashboard

</a>

</li><!-- li Ends -->

<li><!-- Products li Starts -->

<a href="#" data-toggle="collapse" data-target="#products">

<i class="fa fa-th"></i> Products

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="products" class="collapse">

<li  >
<a href="index.php?insert_product"> Insert Products </a>
</li>

<li>
<a href="index.php?view_products"> View Products </a>
</li>


</ul>

</li><!-- Products li Ends -->





<li><!-- li Starts -->

<a href="#" data-toggle="collapse" data-target="#cat">

<i class="fa fa-cubes"></i> Categories

<i class="fa fa-fw fa-caret-down"></i>

</a>

<ul id="cat" class="collapse">

<li>
<a href="index.php?insert_cat"> Insert Category </a>
</li>

<li>
<a href="index.php?view_cats"> View Categories </a>
</li>


</ul>

</li><!-- li Ends -->



<li><!-- Coupons Section li Starts -->

<a href="#" data-toggle="collapse" data-target="#coupons"><!-- anchor Starts -->

<i class="fa fa-money"></i> Coupons

<i class="fa fa-fw fa-caret-down"></i>

</a><!-- anchor Ends -->

<ul id="coupons" class="collapse"><!-- ul collapse Starts -->

<li>
<a href="index.php?insert_coupon"> Insert Coupon </a>
</li>

<li>
<a href="index.php?view_coupons"> View Coupons </a>
</li>

</ul><!-- ul collapse Ends -->

</li><!-- Coupons Section li Ends -->


<li>

<a href="index.php?view_customers">

<i class="fa fa-users"></i> View Customers

</a>

</li>
<li>

<a href="index.php?order_status">

<i class="fa fa-truck"></i> Orders Status

</a>

</li>
<!-- style='display:none' -->
<li ><!-- li Starts -->

<a href="#" data-toggle="collapse" data-target="#users">

<i class="fa fa-cogs"></i> Admin

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="users" class="collapse">

<li id='ins' style='display:none'>
<a href="index.php?insert_user"> Insert Admin </a>
</li>

<li>
<a id='view' style='display:none' href="index.php?view_users"> View Admins </a>
</li>

<li>
<a href="index.php?user_profile=<?php echo $admin_id; ?>"> Edit Profile </a>
</li>

</ul>

</li><!-- li Ends -->

<li><!-- li Starts -->

<a href="logout.php">

<i class="fa fa-fw fa-power-off"></i> Log Out

</a>

</li><!-- li Ends -->

</ul><!-- nav navbar-nav side-nav Ends -->

</div><!-- collapse navbar-collapse navbar-ex1-collapse Ends -->

</nav><!-- navbar navbar-inverse navbar-fixed-top Ends -->

<?php }

if($_SESSION['ai']==1)
{
   echo '<script>

    const myElement = document.getElementById("ins");
    myElement.style.display = "block";
        
    const myElement2 = document.getElementById("view");
    myElement2.style.display = "block";

    </script>';
}


 ?>