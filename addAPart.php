<?php
	$db = new mysqli('localhost','root','','autoparts');//set your database handler
  	$query = "SELECT DISTINCT category FROM category";
  	$result = $db->query($query);
	
  	while($row = $result->fetch_assoc()){
    	$categories[] = $row['category'];
  	}
  	sort($categories);
	
  	foreach ($categories as $cat) {
		$mapArray[]=array($cat =>array());
	}
  	$query = "SELECT * FROM category";
  	$result = $db->query($query);

  	while($row = $result->fetch_assoc()){
    	$mapArray[$row['category']][] = $row['subCategory'];
  	}
	
	$query = "SELECT DISTINCT year FROM vehicle";
  	$result = $db->query($query);
	
	while($row = $result->fetch_assoc()){
    	$years[] = $row['year'];
  	}
	rsort($years);
	
  	$jsonCats = json_encode($categories);
  	$jsonSubCats = json_encode($mapArray);
	$jsonYears=json_encode($years);
	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 442px;
	height: 365px;
	z-index: 1;
	left: 228px;
	top: 130px;
	border: groove;
}
#apDiv2 {
	border: groove;
	position: absolute;
	width: 410px;
	height: 365px;
	z-index: 2;
	left: 675px;
	top: 130px;
}

</style>

<script type="text/javascript">
	<?php
        echo "var categories = $jsonCats; \n";
        echo "var subcats = $jsonSubCats; \n";
		echo "var years = $jsonYears; \n";
    ?>
		
   	function loadCategories(){
        var select = document.getElementById("categorySelect");
        select.onchange = updateSubCats;
        for(var i = 0; i < categories.length; i++){
          select.options[i+1] = new Option(categories[i],categories[i]);          
       }
    }
	
	function updateSubCats(){
        var catSelect = this;
        var catValue = this.value;
		
        var subcatSelect = document.getElementById("subcatsSelect");
        //subcatSelect.options.length = 0; //delete all options if any present
		if(catValue=="empty"){
			subcatSelect.options.length = 1;
		}else{
			subcatSelect.options.length = 1;
        	for(var i = 0; i < subcats[catValue].length; i++){
          		subcatSelect.options[i+1] = new Option(subcats[catValue][i],subcats[catValue][i]);
       		}
		}
  	}
	
	function loadYear(){
		
        var select = document.getElementById("year");
        //select.onchange = loadMadeBy;
        for(var i = 0; i < years.length; i++){
          select.options[i+1] = new Option(years[i],years[i]);    
		}
    }
	
	
	function onloadFunction(){
		loadCategories();
		loadYear();
	}
	
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

<body onload='onloadFunction()'>

<h1 align="center">Add a Autopart</h1>

<form name="addAPart" method="post" action="addPartDB.php">
<div id="apDiv1" >
<h3 align="center">Autopart details</h3>
  	Category :
    	<select id="categorySelect" name="category" >	
      		<option value="empty">--Select a Category--</option>
    	</select>
  
  <br>
    Sub Category : 
    <select id="subcatsSelect" name="subcategory">
    	<option>--Select a Subcategory--</option>
    </select>
    <br>
    Description : 
    <textarea name="description" id="description" cols="45" rows="5"></textarea>
    <br>
    Quantity : <input type="text" name="quantity" id="quantity" />
    <br>
    Search Keyword : <input type="text" name="keyword" id="keyword" />(Ex:Mirror,Taillight)
    <br>
    Brand New or Used : 
    <input type="radio" name="newOrUsed" value="Brand New">Brand New
    <input type="radio" name="newOrUsed" value="Used">Used  
    <br>
    Price (Rs) : 
    <input type="text" name="price" id="price" />
    <br>
  
</div>


<div id="apDiv2">
  <h3 align="center">Vehicle Details</h3>
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
    <input type="submit" name="submit" />
  
</div>
</form>


</body>
</html>
