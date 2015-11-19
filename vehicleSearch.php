<?php
	$db = new mysqli('localhost','root','','autoparts');//set your database handler

	$query = "SELECT DISTINCT year FROM vehicle";
  	$result = $db->query($query);
	
	while($row = $result->fetch_assoc()){
    	$years[] = $row['year'];
  	}
	rsort($years);

	$jsonYears=json_encode($years);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript">
	<?php
		echo "var years = $jsonYears; \n";
    ?>
	
	function loadYear(){
		
        var select = document.getElementById("year");
        //select.onchange = loadMadeBy;
        for(var i = 0; i < years.length; i++){
          select.options[i+1] = new Option(years[i],years[i]);    
		}
    }
	
	
	/*function onloadFunction(){
		loadCategories();
		loadYear();
	}*/
	
	function loadMadeBy(year) {
		//alert(id);
		if (year == "empty") {
			document.getElementById("madeBy").innerHTML = "<option value='empty'>--Select a Made By--</option>";
			return;
		} else { 
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("madeBy").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","getMadeBy.php?year="+year,true);
			//xmlhttp.open("GET","getMadeBy.php?id="+id,true);
			xmlhttp.send();
		}
	}
	
	function loadModel(year,madeBy){
		if (madeBy == "empty") {
			document.getElementById("model").innerHTML = "<option value='empty'>--Select a Model--</option>";
			return;
		} else { 
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("model").innerHTML = xmlhttp.responseText;
				}
			}
			
			xmlhttp.open("GET","getMadeBy.php?year="+year+"& madeBy="+madeBy,true);
			xmlhttp.send();
		}
	}
	
	function loadSubmodel(year,madeBy,model){
		if (model == "empty") {
			document.getElementById("submodel").innerHTML = "<option value='empty'>--Select a Submodel--</option>";
			return;
		} else { 
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("submodel").innerHTML = xmlhttp.responseText;
				}
			}
			
			xmlhttp.open("GET","getMadeBy.php?year="+year+"& madeBy="+madeBy+"& model="+model,true);
			xmlhttp.send();
		}
	}
	
	function loadEngine(year,madeBy,model,submodel){
		if (submodel == "empty") {
			document.getElementById("engine").innerHTML = "<option value='empty'>--Select a Engine--</option>";
			return;
		} else { 
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("engine").innerHTML = xmlhttp.responseText;
				}
			}
			
			xmlhttp.open("GET","getMadeBy.php?year="+year+"& madeBy="+madeBy+"& model="+model+"& submodel="+submodel,true);
			xmlhttp.send();
		}
	}
</script>

</head>

<body onload="loadYear()">

<h1 align="center">Search a part using Vehicle details</h1>
<form id="form1" name="form1" method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
<div id="apDiv2">
  
  Year :
    <select id="year" name="year" onchange="loadMadeBy(this.value)">	
      <option value="empty">--Select a Year--</option>
    </select>
    <br>
    Made By :
    <select id="madeBy" name="madeBy" onchange="loadModel(year.value,this.value)">
    	<option value="empty">--Select a Made By--</option>
    </select>
    <br>
    Model :
    <select id="model" name="model" onchange="loadSubmodel(year.value,madeBy.value,this.value)">
    	<option value="empty">--Select a Model--</option>
    </select>
    <br>
    Submodel :
    <select id="submodel" name="submodel" onchange="loadEngine(year.value,madeBy.value,model.value,this.value)">
    	<option value="empty">--Select a Submodel--</option>	
    </select>
    <br>
    Engine :
    <select id="engine" name="engine" >
    	<option value="empty">--Select a Engine--</option>
    </select>
  	<br>
    <input type="submit" name="search" value="Search"/>
    
</div>
</form><P></P>
<?php

echo "<table>";
echo "<tr> <th>partID</th> <th>sellerID</th> <th>vehicle ID</th>  <th>sub category</th> <th>Keyword</th> <th>Quantity</th><th>Description</th><th>New or Used</th><th>Price</th></tr>";

$db = new mysqli('localhost','root','','autoparts');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
   $year = $_GET["year"];
   $madeBy = $_GET["madeBy"];
   $model = $_GET["model"];
   $submodel = $_GET["submodel"];
   $engine = $_GET['engine'];
   
   //echo $subcategory.$engine ;
   $query = "SELECT vehicleID FROM vehicle WHERE year=$year AND madeBy='$madeBy' AND model='$model' AND submodel='$submodel' AND engine='$engine'";
   
   $result = $db->query($query);
   $row = $result->fetch_assoc();
   $vehicleID =$row['vehicleID'];
   
   $query="SELECT * FROM part WHERE vehicleID=$vehicleID";
   $result = $db->query($query);
   
   while($row = $result->fetch_assoc()){
	echo "<tr><td>";
	echo $row['partID'];
	echo "</td><td>";
	echo $row['sellerID'];
	echo "</td><td>";
	echo $row['vehicleID'];
	echo "</td><td'>";
	echo $row['subCategory'];
	echo "</td><td>";
	echo $row['keyword'];
	echo "</td><td>";
	echo $row['quantity'];
	echo "</td><td>";
	echo $row['description'];
	echo "</td><td>";
	echo $row['newOrUsed'];
	echo "</td><td>";
	echo $row['price'];
	echo "</td></tr>";
	}
echo "</table>";
}
?>


</body>
</html>