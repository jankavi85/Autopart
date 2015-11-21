<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$user= $_SESSION['username'];
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
mysql_close();
?>
