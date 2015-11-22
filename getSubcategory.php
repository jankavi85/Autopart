<?php
	include "database/dbconnect.php";
	
	if($_GET['category']!= null){
		$category = $_GET['category'];
		$query = "SELECT subCategory FROM category WHERE category='".$category."'";
		//$query = "SELECT subCategory FROM category WHERE category='Wheels & Tires'";
		$result = $conn->query($query);
		
		while($row = $result->fetch_assoc()){
    		$category1[] = $row['subCategory'];
  		}
		
		rsort($category1);
		
		//echo "<option value='empty'>--Select a Subcategory--</option>";
		echo "<option value=''>--Select a Subcategory--</option>";
		foreach($category1 as $value){
			echo "<option >".$value."</option>";
			
		}
	}
?>