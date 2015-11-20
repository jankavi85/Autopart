<?php
	include "database/dbconnect.php";
	$query = "SELECT DISTINCT year FROM vehicle";
  	$result = $conn->query($query);
	
	while($row = $result->fetch_assoc()){
    	$years[] = $row['year'];
  	}
	rsort($years);
	$jsonYears=json_encode($years);
	
	$query = "SELECT DISTINCT category FROM category";
	$result = $conn->query($query);
	
	while($row = $result->fetch_assoc()){
    	$category[] = $row['category'];
  	}
	
	rsort($category);
	$jsonCategory=json_encode($category);
	$jsonYears=json_encode($years);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sell a part</title>
<?php //include "header.php" ?>
<script src="script/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="script/index.js" type="text/javascript"></script>
<script type="text/javascript">
	<?php
		echo "var years = $jsonYears; \n";
		echo "var category = $jsonCategory; \n";
    ?>

	function loadYear(){
		
        var select = document.getElementById("year");
        for(var i = 0; i < years.length; i++){
          select.options[i+1] = new Option(years[i],years[i]);    
		}
    }
	
	function loadCategories(){
		//var categories=["a","b","c","d"];
        var select = document.getElementById("category");
        for(var i = 0; i < category.length; i++){
          select.options[i+1] = new Option(category[i],category[i]);          
       }
    }
	
	function loadMadeBy(year) {
		
		if (year == "empty") {
			document.getElementById("madeBy").innerHTML = "<option value='empty'>--Select a Made By--</option>";
			document.getElementById("model").innerHTML = "<option value='empty'>--Select a Model--</option>";
			document.getElementById("submodel").innerHTML = "<option value='empty'>--Select a Submodel--</option>";
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
					document.getElementById("madeBy").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","getMadeBy.php?year="+year,true);
			//xmlhttp.open("GET","getMadeBy.php?id="+id,true);
			xmlhttp.send();
		}
		//alert("bninm");
	}
	
	function loadModel(year,madeBy){
		if (madeBy == "empty") {
			document.getElementById("model").innerHTML = "<option value='empty'>--Select a Model--</option>";
			document.getElementById("submodel").innerHTML = "<option value='empty'>--Select a Submodel--</option>";
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
<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 900px;
	height: 1100px;
	z-index: 1;
	left: 224px;
	top: 120px;
}

#apDiv2 {
	position: absolute;
	width: 177px;
	height: 19px;
	z-index: 2;
	left: 396px;
	top: 224px;
}
#apDiv3 {
	position: absolute;
	width: 177px;
	height: 19px;
	z-index: 3;
	left: 396px;
	top: 271px;
}
#apDiv4 {
	position: absolute;
	width: 291px;
	height: 99px;
	z-index: 2;
	left: 395px;
	top: 330px;
}
#apDiv5 {
	position: absolute;
	width: 177px;
	height: 19px;
	z-index: 4;
	left: 396px;
	top: 463px;
}
#apDiv6 {
	position: absolute;
	width: 177px;
	height: 19px;
	z-index: 2;
	left: 396px;
	top: 515px;
}
#apDiv7 {
	position: absolute;
	width: 177px;
	height: 19px;
	z-index: 2;
	left: 395px;
	top: 571px;
}
#apDiv8 {
	position: absolute;
	width: 177px;
	height: 19px;
	z-index: 2;
	left: 396px;
	top: 737px;
}
#apDiv9 {
	position: absolute;
	width: 177px;
	height: 19px;
	z-index: 2;
	left: 395px;
	top: 790px;
}
#apDiv10 {
	position: absolute;
	width: 177px;
	height: 19px;
	z-index: 2;
	left: 396px;
	top: 851px;
}
#apDiv11 {
	position: absolute;
	width: 177px;
	height: 19px;
	z-index: 2;
	left: 396px;
	top: 906px;
}
#apDiv12 {
	position: absolute;
	width: 177px;
	height: 19px;
	z-index: 2;
	left: 395px;
	top: 965px;
}

.sellselect{
    width: 177px;
	height: 19px;
	font-size: 13px;
	border:none;
	background-color:#FFF;
	outline:none;
	
}
.selldes{
    width: 285px;
	height: 90px;
	font-size: 13px;
	border:none;
	background-color:#FFF;
	outline:none;
}

#apDiv13 {
	position: absolute;
	width: 153px;
	height: 32px;
	z-index: 2;
	left: 407px;
	top: 1022px;
}
#submit{
    width: 153px;
	height: 32px;
	border:none;
	outline:none;
}
</style>
</head>

<body onload="loadYear(),loadCategories()">

<div id="apDiv1"><img src="images/sellpart/addapartform.png" width="900" height="1100" alt="" />
  
  
	<form id="form1" name="form1" method="post" action="">
   	  <div id="apDiv2">
      	<select id="category" name="category" class="sellselect" onchange="loadMadeBy(this.value)">
      		<option value="empty">--Select a Category--</option>
    	</select>
      </div>
      <div id="apDiv3">
      <select id="subcategory" name="subcategory" class="sellselect" onchange="loadMadeBy(this.value)">
      		<option value="empty">--Select a Subcategory--</option>
    	</select>
      </div>
      <div id="apDiv4">
      <textarea name="textarea" id="textarea" class="selldes" cols="35" rows="5"></textarea>
      </div>
      <div id="apDiv5">
      	<input name="quantity" type="text" class="sellselect"/>
      </div>
      <div id="apDiv6">
      <select id="category" name="category" class="sellselect" onchange="loadMadeBy(this.value)">
   		<option value="Brand New">Brand New</option>
            <option value="Used">Used</option>
    	</select>
      </div>
      <div id="apDiv7">
      	<input name="price" type="text" class="sellselect"/>
      </div>
      <div id="apDiv8">
      <select id="year" name="year" class="sellselect" onchange="loadMadeBy(this.value)">
      		<option value="empty">--Select a Year--</option>
    	</select>
      </div>
      <div id="apDiv9">
      <select id="madeBy" name="madeBy" class="sellselect" onchange="loadModel(year.value,this.value)">
   		<option value="empty">--Select a Made By--</option>
    	</select>
      </div>
      <div id="apDiv10">
      <select id="model" name="model" class="sellselect" onchange="loadSubmodel(year.value,madeBy.value,this.value)">
   		<option value="empty">--Select a Model--</option>
    	</select>
      </div>
      <div id="apDiv11">
      <select id="submodel" name="submodel" class="sellselect" onchange="loadEngine(year.value,madeBy.value,model.value,this.value)">
    		<option value="empty">--Select a Submodel--</option>	
    	</select>
      </div>
      <div id="apDiv12">
      <select id="engine" class="sellselect" name="engine" >
   		<option value="empty">--Select a Engine--</option>
    	</select>
      </div>
        
      <div id="apDiv13">
      <input type="submit" id="submit" value=""
        onmouseover="mouseOn('submit','aftersubmit')" onmouseout="mouseOut('submit','presubmit')"
        style="background-image:url(images/Index/presubmit.png);background-color: Transparent;"/>
        </div>
  </form>
</div>
</body>
</html>