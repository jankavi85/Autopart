<head>
<?php include "header.php" ?>
<script type="text/javascript">
function ValidateMobNumber(txtMobId) {
  var fld = document.getElementById(txtMobId);

  if (fld.value == "") {
  return false;
 }
  if (isNaN(fld.value)) {
  alert("The phone number contains illegal characters.");
  fld.value = "";
  fld.focus();
  return false;
 }
 else if (!(fld.value.length == 10)) {
  alert("The phone number is the wrong length. \nPlease enter 10 digit mobile no.");
  fld.value = "";
  fld.focus();
  return false;
 }

}
</script>


<style type="text/css">


#basic {
	position:absolute;
	left:159px;
	top:152px;
	width:351px;
	height:234px;
	z-index:3;
	background-color: rgba(255,255,255,0.8);
	border-radius:20px;
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
</style>

</head>
<body>
<div id="coverPics">


  <div id="basic">
  
    <form id="form1" name="form1" method="post" action="createprofile.php">
   
    <table>
    <tr>
     <td width="20" height="20px"></td>
     </tr>
    <tr>
    <td width="20"></td>
  	<td >
       <label for="username">User Name</label>
       </td>
       <td>
       <input type="text"  name="username" id="username" autocomplete="off" required/>
     </td>
     </tr>
     
      <tr><td></td></tr>
     
     <tr>
     <td width="20"></td>
     <td >
       <label for="Password">Password</label>
       </td>
       <td>
       <input type="password"  name="Password" id="Password" autocomplete="off" required/>
     	</td>
        </tr> 
        <tr><td></td></tr>
        
        <tr>
        <td width="20"></td>
        <td >
       <label for="confirmPassword">Confirm Password</label>
	</td>
    <td>
       <input type="password" name="confirmPassword" id="confirmPassword" autocomplete="off" required />
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
       <input type="text" name="Mobile" id="Mobile"  required/>
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
       <input type="text" name="email" id="email"   required/>
    </td>
    </tr>
</table>
      <table>
      <tr></tr><tr></tr><tr></tr><tr><td width="200px"></td><td>
      
      <input type="submit" name="next" id="saveContact" value="SUBMIT" /> </td></tr></table>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </form>


</div>
