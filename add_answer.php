<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$user= $_SESSION['user'];
include "database/dbconnect.php";

$id=$_POST['id'];
 
// Find highest answer number. 
$sql="SELECT MAX(a_id) AS Maxa_id FROM fanswer WHERE question_id='$id'";
$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_array($result);
 
// add + 1 to highest answer number and keep it in variable name "$Max_id". if there no answer yet set it = 1 
if ($rows) {
$Max_id = $rows['Maxa_id']+1;
}
else {
$Max_id = 1;
}
 
// get values that sent from form 
$a_answer=$_POST['a_answer']; 
 
$datetime=date("d/m/y H:i:s"); // create date and time
 
// Insert answer 
$sql2="INSERT INTO fanswer(question_id, a_id,user,a_answer, a_datetime)VALUES('$id', '$Max_id','$user', '$a_answer', '$datetime')";
$result2=mysqli_query($conn,$sql2);
 
if($result2){
// If added new answer, add value +1 in reply column 

$sql3="UPDATE fquestions SET reply='$Max_id' WHERE id='$id'";
$result3=mysqli_query($conn,$sql3);
header('Location: view_topic.php?id='.$id.'');
   exit();
}
else {
echo "ERROR";
}
 
// Close connection
mysqli_close($conn);


?>