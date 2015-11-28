<head>
<link rel="stylesheet" type="text/css" href="css/profilenew.css">
<link rel="stylesheet" type="text/css" href="css/partDetails.css" />
<?php   
	include "header.php";
	include "database/dbconnect.php";
	include "sessioncheck.php";
	$username=$_SESSION['user'];
    $sql = "SELECT * FROM user where username='$username'";
    //echo $sql;
    $result = mysqli_query($conn,$sql);
    $rws0 = mysqli_fetch_array($result);
	$userid= $rws0['userID'];	
	$username=$rws0['username'];
	$mobile=$rws0['mobilenumber'];
	$email=$rws0['email'];
	
?>
<style type="text/css">
.main {
	position: absolute;
	width: 1081px;
	height: 823px;
	top: 100px;
	left: 186px;
}
.edit {
	font-size: 14px;
	font-weight: bolder;
	background-color: #999;
	position: absolute;
	z-index:3;
	left: -29px;
	top: -468px;
}
#apDiv2 {
	position:absolute;
	left:919px;
	top:710px;
	width:89px;
	height:30px;
	z-index:1;
}
#apDiv3 {
	position:absolute;
	left:864px;
	top:188px;
	width:122px;
	height:27px;
	z-index:5;
	font-weight: bold;
	color: #000;
	font-size: 18px;
}
</style>


<script>

function selectFunction(variable){
		
		

				if (variable == 0)
		{			
		document.getElementById("apDivTopic0").style.zIndex = 8;
		
		document.getElementById("apDivTag0").style.color = "black" ;
		document.getElementById("apDivTag1").style.color = "grey" ;
		document.getElementById("apDivTag2").style.color = "grey" ;
	
		
		document.getElementById("apDivOptionBox0").style.visibility = "visible";
		document.getElementById("apDivOptionBox1").style.visibility = "hidden";
		document.getElementById("apDivOptionBox2").style.visibility = "hidden";
	
		
		document.getElementById("apDivBar0").style.background = "orange";
		document.getElementById("apDivBar1").style.background = "white";
		document.getElementById("apDivBar2").style.background = "white";
	
		
		document.getElementById("apDivProfBox").style.height = "400px" ;	

		
		}

		if (variable == 1)
		{
			
		document.getElementById("apDivTopic1").style.zIndex = 8;
		
		document.getElementById("apDivTag1").style.color = "black" ;
		document.getElementById("apDivTag0").style.color = "grey" ;
		document.getElementById("apDivTag2").style.color = "grey" ;
		
		
		document.getElementById("apDivOptionBox0").style.visibility = "hidden";
		document.getElementById("apDivOptionBox1").style.visibility = "visible";
		document.getElementById("apDivOptionBox2").style.visibility = "hidden";
		
		
		document.getElementById("apDivBar1").style.background = "orange";
		document.getElementById("apDivBar0").style.background = "white";
		document.getElementById("apDivBar2").style.background = "white";
		
		
		document.getElementById("apDivProfBox").style.height = "400px" ;

		}
		if (variable == 2)
		{
			
		document.getElementById("apDivTopic2").style.zIndex = 8;
		
		document.getElementById("apDivTag2").style.color = "black" ;
		document.getElementById("apDivTag1").style.color = "grey" ;
		document.getElementById("apDivTag0").style.color = "grey" ;
		
		
		document.getElementById("apDivOptionBox0").style.visibility = "hidden";
		document.getElementById("apDivOptionBox1").style.visibility = "hidden";
		document.getElementById("apDivOptionBox2").style.visibility = "visible";
		
		
		document.getElementById("apDivBar2").style.background = "orange";
		document.getElementById("apDivBar1").style.background = "white";
		document.getElementById("apDivBar0").style.background = "white";
		
		
		
		document.getElementById("apDivProfBox").style.height = "400px" ;		
		
		}
			
} 
</script>


</head>

<body>
<div class="main">

<div id="spProfEditContainer"> 


<div id="apDivProfBox">

  <div id="apDivProfAbout">

		<div id="apDivIcon"><img src="images/face.png" width="40" height="39" alt="icon" /></div>

		<div id="apDivAbout">View</div>
      </div>

   

  <div id="apDivTopicList">

		<a href="#">
		<div id="apDivTopic0">
			<div id="apDivBar0"> </div>
		  <div id="apDivTag0" onclick = "selectFunction(0);">My Details</div>
		</div>
    	</a>

		<a href="#">
		<div id="apDivTopic1" style= "top:65px">
		  <div id="apDivBar1" ></div>
		  <div id="apDivTag1" onclick = "selectFunction(1)">Add Cart Details</div>
		</div>
        </a>
        <a href="#">
		<div id="apDivTopic2" style= "top:130px">
		  <div id="apDivBar2" ></div>
		  <div id="apDivTag2" onclick = "selectFunction(2)">Sell Parts Details</div>
		</div>
        </a>

        
  </div>






 <div id="apDivOptionBox0">
 	<section id="bordermy">
   		<div class="rowmy">
 			<p class="left" ><strong>Name  : </strong></p>
 			<p class="right" ><?php echo $username;?></p>
 		</div>
 		<div class="rowmy">
 			<p class="left" ><strong>Email  : </strong></p>
 			<p class="right" ><?php echo $email;?></p>
 		</div>
 		<div class="rowmy">
 			<p class="left" ><strong>Mobile : </strong></p>
 			<p class="right" ><?php echo $mobile?></p>
 		</div>
 	</section> 


  </div>
    
<div id="apDivOptionBox1">
	<?php
$getPartIdSQL = "SELECT `partID`, `quantity` FROM `cart` WHERE `userID`= '$userid' ;";
//echo $sql1;
$resultgetCart = $conn->query($getPartIdSQL);
if ($resultgetCart->num_rows > 0) {
    while ($rowGrtCart = $resultgetCart->fetch_assoc()) {
        $pID = $rowGrtCart["partID"];
        $qunty = $rowGrtCart["quantity"];
        $sqlFromPart = "SELECT `subCategory`,`newOrUsed`, `price` FROM `part` WHERE partID = '$pID' ; ";
        $resultFromPart = $conn->query($sqlFromPart);
        while ($rowFromPart = $resultFromPart->fetch_assoc()) {
            $sCat = $rowFromPart["subCategory"];
            $china = $rowFromPart["newOrUsed"];
            $price = $rowFromPart["price"];
        }
        ?>
        <section id="border">
            <p id="p1"><?php echo $china ?> <?php echo $qunty ?> <?php echo $sCat ?></p>
            <p id="p3">Rs <?php echo $price ?> each</p>
            <hr>
        </section> <?php }
}else{ ?>
 		<section id="borderEmpty">
 		<p id="pr"><strong>you did not add anything to cart</strong></p>
 	</section>
 	<?php } ?> 
   
 </div>

 <div id="apDivOptionBox2">
 	<?php

 	$getUserIdSQL = "SELECT `subCategory`, `quantity`, `description`, `newOrUsed`, `price` FROM `part` WHERE userID = '$userid' ; ";
 	

    $UserIdResult = $conn->query($getUserIdSQL);
    //echo $UserIdResult;

    if ($UserIdResult->num_rows > 0) {
        while ($DetailRow = $UserIdResult->fetch_assoc()) {
            $sCat = $DetailRow["subCategory"];
            $qun = $DetailRow["quantity"];
            $desc = $DetailRow["description"];
            $china = $DetailRow["newOrUsed"];
            $price = $DetailRow["price"];
            //echo $price;
    ?>                                
                              
 	<section id="border">
 		<p id="p1"><?php echo $china ?> <?php echo $qun ?> <?php echo $sCat ?></p>
 		<hr>
 		<p id="p2"><?php echo $desc ?></p>
 		<hr>
 		<p id="p3">Rs <?php echo $price ?></p>
 	</section>
 	<?php }}
 	else{ ?>
 		<section id="borderEmpty">
 		<p id="pr"><strong>You have not add any part</strong></p>
 	</section>
 	<?php } ?> 
 	
  </div>
      
</div>

</div>
</div>
</body>
</html>
