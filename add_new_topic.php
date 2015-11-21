<?php
include "sessioncheck.php" ;
$user= $_SESSION['user'];
$topic=$_POST['topic'];
$detail=$_POST['detail'];

include "database/dbconnect.php";

$datetime=date("d/m/y h:i:s");

$sql="INSERT INTO fquestions(user,topic,detail,datetime)VALUES('$user','$topic', '$detail', '$datetime')";
$result = mysqli_query($conn, $sql);

if($result){
header('Location: forum.php');
   exit();
}
else {
echo "ERROR";
}
mysqli_close($conn);
?>
