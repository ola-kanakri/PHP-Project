<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "ecom_store";

$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die ("failed to connect!");

