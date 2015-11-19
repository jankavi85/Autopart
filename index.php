<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?php include "header.php" ?>
<link rel="stylesheet" type="text/css" href="index.css">
<style type="text/css">
#apDiv5 {
	position: absolute;
	width: 356px;
	height: 300px;
	z-index: 0;
	left: 2px;
	top: 114px;
}
#apDiv6 {
	position: absolute;
	width: 341px;
	height: 286px;
	z-index: 4;
	left: 9px;
	top: 122px;
}
#apDiv7 {
	position: absolute;
	width: 177px;
	height: 29px;
	z-index: 5;
	left: 27px;
	top: 22px;
}
#apDiv8 {
	position: absolute;
	width: 177px;
	height: 29px;
	z-index: 1;
	left: 27px;
	top: 81px;
}
#apDiv9 {
	position: absolute;
	width: 177px;
	height: 29px;
	z-index: 6;
	left: 27px;
	top: 140px;
}
#apDiv10 {
	position: absolute;
	width: 177px;
	height: 29px;
	z-index: 7;
	left: 27px;
	top: 195px;
}
#apDiv11 {
	position: absolute;
	width: 177px;
	height: 29px;
	z-index: 8;
	left: 27px;
	top: 251px;
}
#apDiv12 {
	position: absolute;
	width: 118px;
	height: 267px;
	z-index: 9;
	left: 223px;
	top: 18px;
}

#select{
    width: 177px;
	height: 29px;
	font-size: 15px;
	border:none;
	background-color:#FFF;
	outline:none;
}

</style>
<script src="jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="index.js" type="text/javascript"></script>


</head>

<body>



<section id="counter">1</section>

<section id="slider_wrapper">
	<div id ="slide_back"><img src="Slides/slide2.png" alt="slide1"/></div>
  <div id ="slide_front"><img src="Slides/slide1.png" alt="slide1"/></div>
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
<div id="apDiv5"><img src="Index/findvehicle.png" width="355" height="300" />
	
  <form id="form1" name="form1" method="post" action="">
  	<div id="apDiv7">
    	<select id="select">
        	<option value="selectyear">Select Year</option>
  			<option value="2015" >2015</option>
  			<option value="2014">2014</option>
  			<option value="2013">2013</option>
        </select>
    </div>   
    <div id="apDiv8">
    	<select id="select">
        	<option value="selectmake">Select Make</option>
  			<option value="2015" >2015</option>
  			<option value="2014">2014</option>
  			<option value="2013">2013</option>
        </select>
    </div>
    <div id="apDiv9">
   	  <select id="select">
      		<option value="selectmodel">Select Model</option>
  			<option value="2015" >2015</option>
  			<option value="2014">2014</option>
  			<option value="2013">2013</option>
      </select>
    </div>
    <div id="apDiv10">
   	  <select id="select">
      		<option value="selectsubmodel">Select Submodel</option>
  			<option value="2015" >2015</option>
  			<option value="2014">2014</option>
  			<option value="2013">2013</option>
      </select>
    </div>
	<div id="apDiv11">
   	  <select id="select">
      		<option value="selectengine">Select Engine</option>
  			<option value="2015" >2015</option>
  			<option value="2014">2014</option>
  			<option value="2013">2013</option>
      </select>
    </div>
	<div id="apDiv12">
    	<input type="submit" id="findVehicle" value=""
         onmouseover="mouseOn('findVehicle')" onmouseout="mouseOut('findVehicle')"
   		 style="background-image:url(index/findButton.png);background-color: Transparent;"/>
    </div>
  </form>
</div>
</body>
</html>
