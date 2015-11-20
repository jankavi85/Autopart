<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Autopart.lk</title>
<meta charset="UTF-8">
<link href="css/header.css" rel="stylesheet">

</head>
<script>

function Fun() {	

	setInterval( function(){		
		var widthVal = window.innerWidth;	
		console.log(widthVal);
		if (widthVal >1100){		
			document.getElementById("main-header").style.right ="30%";
			}		
		else if(widthVal >1024){
			document.getElementById("main-header").style.right ="15%";
			}
		else{
			document.getElementById("main-header").style.visibility = "hidden" ;
			document.getElementById("menu").style.visibility = "hidden" ;
			//document.getElementById("sinhala").style.visibility = "hidden" ;		
			//document.getElementById("tamil").style.visibility = "hidden" ;
			document.getElementById("apDivBaasLk").style.fontSize = "30px" ;
			document.getElementById("apDivBaasLk").style.top = "30px" ;
			document.getElementById("tamil").style.right = "0px" ;
			document.getElementById("sinhala").style.right = "45px" ;
			}			
	},500 );
}
</script>

<script>//window.onload = Fun;</script>

<div id="apDivHeaderContainer">

	<?php 		
	if(isset($_SESSION['username']) ) { //Checking whether a user has logged in
		$username=$_SESSION['username'];
		$mobile=$_SESSION['mobile'];
		
		echo "
			<div id=\"name\">$username</div>
			<a href =\"logout.php\"><div id=\"apDivLogout\">
			<img src=\"images/lgout.png\" width=\"100\" height=\"35\" alt=\"logot\" /></div></a>";
	}

	else{
		echo "
			<div id=\"joinus\">
			<a href=\"signup.php\"><img src=\"images/joinus.png\"></a></div>

			<div id=\"login\">
			<a href=\"login.php\"><img src=\"images/login.png\"></a></div>";
	}
	?>

	
	<div id="apDivUBar1"></div>
	<div id="apDivUBar2"></div>
	<div id="apDivBaasLk">Autopart.lk</div>
	
	

	<div id ="menu" class="menubar">
		<ul>
	  		<li><a href="index.php">Home</a></li>	  		
	  		<li><a href="#">FORUM</a></li>
			<li><a href="#">ABOUT Us</a></li>
			<li><a href="#">CONTACT US</a></li>
 
		</ul>
	</div>
</div>






<body>

	
	

	

	

</body>

</html>







