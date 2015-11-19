<?php
	include "database/dbconnect.php";//set your database handler

	$query = "SELECT DISTINCT year FROM vehicle";
  	$result = $conn->query($query);
	
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
<?php include "header.php" ?>
<link rel="stylesheet" type="text/css" href="css/index.css">
<script src="script/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="script/index.js" type="text/javascript"></script>
<script type="text/javascript">
	<?php
		echo "var years = $jsonYears; \n";
    ?>
	
	function loadYear(){
		//alert("sfsgf");
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

<section id="counter">1</section>

<section id="slider_wrapper">
	<div id ="slide_back"><img src="images/Slides/slide2.png" alt="slide1"/></div>
  <div id ="slide_front"><img src="images/Slides/slide1.png" alt="slide1"/></div>
  <div id="controls">
   	<div id="arrow_wrapper">
        	<div id="left" onclick="prevSlide()"></div>
        	<div id="right" onclick="nextSlide()"></div>
    </div>
    
<div id="jumpers">
   	    <ul>
           	  <li id="1" onclick="jump(1)" class="current"></li>
              <li id="2" onclick="jump(2)" ></li>
              <li id="3" onclick="jump(3)"></li>
              <li id="4" onclick="jump(4)"></li>
              <li id="5" onclick="jump(5)"></li>
   	  </ul>
    </div>
  </div>
</section>
<div id="apDiv5"><img src="images/Index/findvehicle.png" width="355" height="300" />
	
  <form id="form1" name="form1" method="post" action="">
  	<div id="apDiv7">
    	<select id="year" name="year" class="select" onchange="loadMadeBy(this.value)">
      		<option value="empty">--Select a Year--</option>
    	</select>
    </div>   
    <div id="apDiv8">
    	<select id="madeBy" name="madeBy" onchange="loadModel(year.value,this.value)">
    		<option value="empty">--Select a Made By--</option>
    	</select>
    </div>
    <div id="apDiv9">
   	  	<select id="model" name="model" onchange="loadSubmodel(year.value,madeBy.value,this.value)">
    		<option value="empty">--Select a Model--</option>
    	</select>
    </div>
    <div id="apDiv10">
   	  	<select id="submodel" name="submodel" onchange="loadEngine(year.value,madeBy.value,model.value,this.value)">
    		<option value="empty">--Select a Submodel--</option>	
    	</select>
    </div>
	<div id="apDiv11">
   	  	<select id="engine" name="engine" >
    		<option value="empty">--Select a Engine--</option>
    	</select>
    </div>
	<div id="apDiv12">
    	<input type="submit" id="findVehicle" value=""
         onmouseover="mouseOn('findVehicle')" onmouseout="mouseOut('findVehicle')"
   		 style="background-image:url(images/Index/findButton.png);background-color: Transparent;"/>
    </div>
  </form>
</div>
</body>
</html>
