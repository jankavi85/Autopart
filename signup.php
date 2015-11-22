<head>
<?php include "header.php"; ?>
<script type="text/javascript">
function ValidateMobNumber(txtMobId) {
  var fld = document.getElementById(txtMobId);

  if (isNaN(fld.value)) {
  alert("The phone number contains illegal characters.");
  fld.value="";
  fld.focus();
  return false;
 }
 else if (!(fld.value.length == 10 || fld.value.length == 0)) {
  alert("The phone number is the wrong length. \nPlease enter 10 digit mobile no.");
  fld.value="";
  fld.focus();
  return false;
 }

}
</script>
<?php
include "database/dbconnect.php"; 
$query = "SELECT username,email FROM user";
  	$result = $conn->query($query);
	$found=0;
	while($row = $result->fetch_assoc()){
		$found++;
    	$userarray[] = $row['username'];
		$emailarray[]=$row['email'];
  	}
	if($found!=0)
	{
	$username=json_encode($userarray);
	$email=json_encode($emailarray);
	}
  ?> 
<script>
function validateform(emailid){  
<?php
		echo "var email = $email; \n";
 ?>
  
var emailid = document.getElementById(emailid);
var atposition=emailid.value.indexOf("@");  
var dotposition=emailid.value.lastIndexOf("."); 

for(var i = 0; i < email.length; i++){
          if(email[i]==emailid.value)
		  {
			alert("Email already exist");
			emailid.value="";
			emailid.focus();
			 return false;   
		  }
		
        }
if(emailid.value!="")
{
if(atposition<1 || dotposition<atposition+2 || dotposition+2>=emailid.value.length){  
  alert("Please enter a valid e-mail address"); 
  emailid.value="";
  emailid.focus();
   return false;  
}
}

}  
</script>
<script>
function usernamevalidate(username)
{
	 var usernameid = document.getElementById(username);
	 <?php
		echo "var username = $username; \n";
    ?>
		
        for(var i = 0; i < username.length; i++){
          if(username[i]==usernameid.value)
		  {
			alert("user name already exist");
			usernameid.value="";
			usernameid.focus();
			 return false;   
		  }
		
        }
	
}


</script>
<script>
function passwordvalid(password)
{
	
	 var passwordid = document.getElementById(password);
	     
		  if(passwordid.value.length<7 && passwordid.value!="")
		  {
			alert("Give long password at least 7 characters");
			passwordid.value="";
			passwordid.focus();
			return false;   
		  }
		
        
	
}

</script>

<script>
function confirmvalid()
{
	
	 var password=document.form1.password.value; 
     var repassword=document.form1.confirmPassword.value;
	
	if(repassword!=password && repassword!="")
	{
		alert("Didn't match password"); 
		document.form1.confirmPassword.value=""; 
		document.form1.confirmPassword.focus();
		return false;
	}
	 
}

</script>


<style type="text/css">


#basic {
	position:absolute;
	left:442px;
	top:212px;
	width:403px;
	height:283px;
	z-index:3;
	background-color: rgba(255,255,255,0.8);
	border-radius:20px;
	border-color:#000;
	border-width:3px;
	border-style:solid;
	
}
#signup
{
	border-radius:20px;
	background-color:#00b300;
	font-family:"Arial Black", Gadget, sans-serif;
	cursor:hand;
	font-size:14px;
	
}


</style>
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
#apDiv3 {
	border:1px #333 solid;
	border-radius:40px;
	position:absolute;
	left:112px;
	top:6px;
	width:170px;
	height:34px;
	z-index:3;
	font-size: 25px;
	font-weight: bold;
	color: #000;
	background-color: 	#00b300;
	text-align: center;
}
#username{
	border-width:3px;
	border-style:inset;
}
#password{
	border-width:3px;
	border-style:inset;
}
#confirmPassword{
	border-width:3px;
	border-style:inset;
}
#mobile{
	border-width:3px;
	border-style:inset;
}
#email{
	border-width:3px;
	border-style:inset;
}
      </style>

</head>
<body>
<div id="coverPics">


  <div id="basic">
  <div id="apDiv3">Sign Up</div>
  
    <form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
   
    <table>
    <tr>
     <td width="20" height="60px"></td>
     </tr>
    <tr>
    <td width="20"></td>
  	<td >
       <label for="username">Username</label>
       </td>
       <td>
       <input type="text"  name="username" id="username" onBlur="return usernamevalidate('username')"autocomplete="off" required/>
     </td>
     </tr>
     
      <tr><td></td></tr>
     
     <tr>
     <td width="20"></td>
     <td >
       <label for="Password">Password</label>
       </td>
       <td>
       <input type="password"  name="password" id="password" onBlur="return passwordvalid('password')" autocomplete="off" required/>
     	</td>
        </tr> 
        <tr><td></td></tr>
        
        <tr>
        <td width="20"></td>
        <td >
       <label for="confirmPassword">Confirm Password</label>
	</td>
    <td>
       <input type="password" name="confirmPassword" id="confirmPassword" autocomplete="off" onBlur="return confirmvalid()" required />
     </td>
     </tr>
     </table>
     
    <table>
     <tr><td></td></tr>
        <tr><td></td></tr>
    <tr>
    <td width="20"></td>
    <td >
       <label for="MobileNo">Mobile No</label>
     </td>
     <td>
       <input type="text" name="mobile" id="mobile" onBlur="return ValidateMobNumber('mobile')" required/>
    </td>
    </tr>
     <tr><td></td></tr>
        <tr><td></td></tr>
    <tr>
    <td width="20"></td>
    <td width="120px" >
       <label for="email">Email Address</label>
       </td>
       <td>
       <input type="text" name="email" id="email"  onBlur="return validateform('email')" required/>
    </td>
    </tr>
</table>
      <table>
      <tr></tr><tr></tr><tr></tr><tr><td width="200px" ></td><td>
      
      <input type="submit" name="signupbutton" id="signup" value="SIGN UP"  /> </td></tr></table>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </form>


</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
 if(isset($_POST["signupbutton"]) )
  {
	  include "database/dbconnect.php"; 
	  $username=$_POST['username'];
	  $password=$_POST['password'];
	  $password=md5($password);
	  $mobile=$_POST['mobile'];
	  $email=$_POST['email'];
	  $sql="INSERT INTO user(username,password,email,mobilenumber)VALUES('$username','$password','$email','$mobile')";	
	  $result = mysqli_query($conn, $sql);
	 
	  session_start();
	  $_SESSION["user"] = $username;
	  $_SESSION["mobile"] = $mobile;
	  header("location:index.php");
	  
  }}
?>