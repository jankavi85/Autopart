<?php
echo "dfg";
header("location:sell.php");
	//if ($_SERVER["REQUEST_METHOD"] == "POST"){
 		//if(isset($_POST["search"]) ){
			/*include "database/dbconnect.php";
			$year=$_POST['year'];
			$madeBy=$_POST['madeBy'];
			$model=$_POST['model'];
			$submodel=$_POST['submodel'];
			$engine=$_POST['engine'];
			
			$quary="SELECT vehicleID FROM vehicle WHERE year='".$year."' AND madeBy='".$madeBy."' AND model='".$model."' AND submodel='".$submodel."' AND engine='".$engine."'";
			$result = $conn->query($quary);
	  		while($row = $result->fetch_assoc()){
				$vehicleID =$row['vehicleID'];
				echo $vehicleID;
	  		}
			
			$quary="SELECT * FROM part WHERE vehicleID='".$vcehicleID."'";
			$result = $conn->query($quary);
	  		while($row = $result->fetch_assoc()){
				echo $row['partID'];
	  		}*/
		//}
	//}
?>