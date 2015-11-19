<?php

	$db = new mysqli('localhost','root','','autoparts');
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $category = $_POST["category"];
   $subcategory =$_POST["subcategory"];
   $description = $_POST["description"];
   $quantity = $_POST["quantity"];
   $keyword = $_POST["keyword"];
   $newOrUsed = $_POST["newOrUsed"];
   $price = $_POST["price"];
   $year = $_POST["year"];
   $madeBy = $_POST["madeBy"];
   $model = $_POST["model"];
   $submodel = $_POST["submodel"];
   $engine = $_POST['engine'];
   
   //echo $subcategory.$engine ;
   $query = "SELECT vehicleID FROM vehicle WHERE year=$year AND madeBy='$madeBy' AND model='$model' AND submodel='$submodel' AND engine='$engine'";
   
   $result = $db->query($query);
   $row = $result->fetch_assoc();
   $vehicleID =$row['vehicleID'];
   //echo count($row);
   
   $query = "INSERT INTO part (sellerID,vehicleID, subCategory,keyword,quantity,description,newOrUsed,price) VALUES (' 1','$vehicleID','$subcategory','$keyword','$quantity','$description','$newOrUsed','$price')";
   
   if ($db->query($query) === TRUE) {
    	echo "New auto part added successfully";
	} else {
    	echo "Error: " . $query . "<br>" . $db->error;
	}
}
?>