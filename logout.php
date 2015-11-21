<?php 
	session_start();
	
	if($_SESSION["username"]){
	$_SESSION["username"] = false;
	}
	session_destroy();
	header('location:index.php');
   

?>