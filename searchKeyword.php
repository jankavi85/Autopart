<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
	$idErr="";
	$message="";
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
	   if (empty($_POST["partID"])) {
		 $idErr = "part ID is required";
	   } else {
		   if($_POST["partID"]<1){
			    $idErr = "part ID can not be 0 or minus";
		   }else{
			 $partID =$_POST["partID"];
			 $db = new mysqli('localhost','root','','autoparts');
			 $query = "DELETE FROM part WHERE partID=$partID";
			 
			 if ($db->query($query) === TRUE) {
				$message= "partID=$partID auto part delete successfully";
			 } else {
				echo "Error: " . $query . "<br>" . $db->error;
			 }
		   }
	   }
	}
?>
<body>
<form name="deletePart" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
	Search a auto part(#keyword) : <input name="partID" type="text" />
    <input name="delete" type="submit" value="Delete this Part" />
    <span class="error"><?php echo $idErr; ?></span>
    <span class="error"><?php echo $message; ?></span>
</form>

</body>
</html>