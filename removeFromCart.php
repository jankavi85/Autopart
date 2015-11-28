<?php 
require ('database/dbconnect.php');
$cartid = $_GET['cardID'];
$dequery = "DELETE FROM cart WHERE cardID ='$cartid';";
mysqli_query($conn, $dequery);
header("Location: success.php");
?>
