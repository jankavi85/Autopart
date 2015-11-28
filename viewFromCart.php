<head>
<?php include "header.php";?>
<style>
        .viewPart{
        width:1000px;
	hight:auto;
        margin: 50px;
        padding: 20px;
        background-color: #71e486;
        }
        .mainView{
            width:1000px;
	hight:auto;
	
        margin: 50px;
        padding: 20px;
        align:center;
        }
</style>
</head>

<?php

require ('database/dbconnect.php');

$sql = "SELECT * ";
$sql .= "FROM part p ";
$sql .= "INNER JOIN cart c ";
$sql .= "ON c.userID=p.userID ";
$sql .= "INNER JOIN vehicle v ";
$sql .= "ON p.vehicleID=v.vehicleID ";
$sql .= "ORDER BY c.partID DESC;";

$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($result);
	
?>
<div class="mainView"><div class="viewPart">
<?php
echo $rows['description'].'</br>';
echo '<b style="color:#209; font-size:20px">Category: </b><i style="color:#000fff; font-size:18px">'.$rows['category'].'</i></br>';
echo '<b style="color:#209">Sub Category: </b><i style="color:#000fff; font-size:18px">'.$rows['subCategory'].'</i></br>'; 
echo '<b style="color:#209">Year: </b><i style="color:#000fff; font-size:18px">'.$rows['year'].'</i></br>';
echo '<b style="color:#209">Made By: </b><i style="color:#000fff; font-size:18px">'.$rows['madeBy'].'</i></br>';
echo '<b style="color:#209">Model: </b><i style="color:#000fff; font-size:18px">'.$rows['model'].'</br>';
echo '<b style="color:#209">Sub Model: </b><i style="color:#000fff; font-size:18px">'.$rows['submodel'].'</i></br>';

echo '<b style="color:#209">Engine: </b><i style="color:#000fff; font-size:18px">'.$rows['engine'].'</i></br>';

echo '<b style="color:#209">New Or Used: </b><i style="color:#000fff; font-size:18px">'.$rows['newOrUsed'].'</i></br>';
echo '<b style="color:#209">Price: </b><i style="color:#000fff; font-size:18px">'.$rows['price'].'</i></br>'; 

//}
?>
</div></div>

<a href="addToCart.php">>>>Back to Cart</a>

