<?php
	 $year=intval($_GET['year']);
	 $madeBy=$_GET['madeBy'];
    include "database/dbconnect.php"; //set your database handler
	$query = "SELECT DISTINCT model FROM vehicle WHERE year='".$year."' AND madeBy='".$madeBy."'";
	$result = $conn->query($query);
	
	while($row = $result->fetch_assoc()){
		$model[]=$row['model'];
	}
	sort($model);
	
	echo "<option value='empty'>--Select a Model--</option>";
	foreach($model as $value){
		echo "<option value=".$value.">".$value."</option>";
	}
?>