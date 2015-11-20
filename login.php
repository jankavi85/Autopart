 <head>
<?php include "header.php"; ?>
 <style>
#coverPics{
	width: 100%
	top:0px;
	background-image: url('images/2.jpg');
	height: 100%
}
.SIGNUPFONT {
	font-weight: bold;
	font-size: 24px;
}
</style>


<style>
#apDiv7 {
	position: absolute;
	left: 380px;
	top: 226px;
	width: 413px;
	height: 240px;
	z-index: 6;
	background-color: #CCCCCC;
}
#apDiv11 {
	position:absolute;
	left:352px;
	top:190px;
	width:252px;
	height:38px;
	z-index:7;
}

.submit {
	font-size: 14px;
	font-weight: bolder;
	background-color: #FC0;
	position: absolute;
	left: 193px;
	width: 102px;
	height: 31px;
}
#apDiv1 {
	position:absolute;
	border:1px #333 solid;
	border-radius:40px;
	left:517px;
	top:180px;
	width:339px;
	height:308px;
	z-index:1;
	color: #CCC;
	background-color: rgba(255,255,255,0.8);
}
#apDiv2 {
	position:absolute;
	left:7px;
	top:0px;
	width:387px;
	height:351px;
	z-index:2;
	color: #000;
	font-weight: bold;
	font-size: 20px;
}
#apDiv3 {
	border:1px #333 solid;
	border-radius:40px;
	position:absolute;
	left:87px;
	top:4px;
	width:170px;
	height:34px;
	z-index:3;
	font-size: 25px;
	font-weight: bold;
	color: #000;
	background-color: #00b300;
	text-align: center;
}


.usetex {
	position: absolute;
	width: 277px;
	height: 39px;
	left: 20px;
	top: 94px;
	background-color: #FFF;
	font-size: 16px;
	font-family:"Arial Black", Gadget, sans-serif;
}
.password {
	position: absolute;
	width: 276px;
	height: 41px;
	left: 23px;
	top: 184px;
	background-color: #FFF;
	font-size: 16px;
	font-family:"Arial Black", Gadget, sans-serif;
}
.login {
	position: absolute;
	left: 96px;
	top: 253px;
	width: 138px;
	height: 35px;
	font-weight: bold;
	font-size: 18px;
	cursor:hand;
}

#apDiv1 #apDiv2 form p {
	color: #000;
}
</style>
</head>
<body>
<div id="coverPics">
<div id="apDiv1">
<div id="apDiv3">User Login</div>
<div id="apDiv2">
  <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <p>&nbsp;</p>
    <p>Username</p>
    <p>
      <label for="textfield"></label>
      <input name="textfield" type="text" class="usetex" placeholder="      Username" id="textfield" autofocus required>
      <input name="button" type="submit" class="login" id="button" value="Login">
    </p>
    <p>&nbsp;</p>
    <p>Password</p>
    <p>
      <label for="textfield2"></label>
      <input name="textfield2" type="password" placeholder="      Password" class="password" id="textfield2" required>
</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </form>

</div>
</div>
</div>

</body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
 if(isset($_POST["button"]) )
  {
	  include "database/dbconnect.php"; 
	 $username = $_POST['textfield'];
	 $password = $_POST['textfield2'];

	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	$password = md5($password);


	$sql="SELECT username,password,mobilenumber FROM user WHERE username='$username' and password='$password'";
	$result=$conn->query($sql);
	if($result->num_rows==1)
	{
	  $rows = mysqli_fetch_assoc($result);
	  session_start();
	  $_SESSION['username'] = $rows['username'];
	  $_SESSION['mobile'] = $rows['mobilenumber'];
	  header("location:index.php");
	}
	else
	{
	header("location:login.php");
	}

$conn->close();

	  
  }}
?>










