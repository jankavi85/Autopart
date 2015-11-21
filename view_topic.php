<link href="css/header.css" rel="stylesheet">
<?php include 'header.php'; ?> 
<style type="text/css">
.createtabel {
	position: absolute;
	left: 127px;
	top: 175px;
	width: 724px;
	height: 450px;
}
#apDiv11 {
	position:absolute;
	left:765px;
	top:333px;
	width:579px;
	height:284px;
	z-index:4;
}
.image {
	position: absolute;
	width: 457px;
	height: 238px;
	left: 114px;
	top: 44px;
}
#apDiv12 {
	position:absolute;
	left:914px;
	top:150px;
	width:379px;
	height:165px;
	z-index:5;
}
.backto {
	font-weight: bold;
	cursor:hand;
}
.image2 {
	position: absolute;
	left: 44px;
	width: 281px;
	top: 34px;
	height: 175px;
}
#answer{
	border-style: outset;
	border-width: 3px;
	border-color: #FC0;
	background-color:#FC0;
	cursor:hand;
	font-weight: bold;
}
#a_answer
{
	border-width: 3px;
	border-style:outset;
}
</style>
</head>

<body>

<?php
 
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="baaslk"; // Database name 
$tbl_name="fquestions"; // Table name 
 
// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
 
// get value of id that sent from address bar 
$id=$_GET['id'];
$sql="SELECT * FROM $tbl_name WHERE id='$id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);
?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div class="createtabel">
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCC" class="viewtopic3">
 <tr>
<td align="center" width="5%"><img src="<?php 
echo $rows['userphoto'];?>" alt="" border=3 height=30 width=30></img></td>
<td width="95%"><table width="100%" border="0" align="right" cellpadding="3" cellspacing="1" bordercolor="1" bgcolor="#FFFFFF">
<tr>
<td bgcolor="#ccc"><strong><?php echo $rows['topic']; ?></strong></td>
</tr>
<tr>
<td bgcolor="#ccc" align="left"><?php echo "by ".$rows['user']."  -    ".$rows['datetime']; ?></td>
</tr>  
<tr>
<td bgcolor="#F8F7F1" height="75%"> <p><?php echo $rows['detail']; ?></p>
  <p>&nbsp;</p></td>
</tr>

</table></td>
</tr>
</table>
<BR>
 
<?php
 // metana database ake tiyena answer eliyata gannawa.
$tbl_name2="fanswer"; // Switch to table "forum_answer"
$sql2="SELECT * FROM $tbl_name2 WHERE question_id='$id'";
$result2=mysql_query($sql2);
while($rows=mysql_fetch_array($result2)){
?>
<table align="center" width="1000">
<tr>
<td>
<table width="95%" border="0"  align="right" cellpadding="0" cellspacing="1" bgcolor="#CCC" class="viewtopic3">
 <tr>
<td align="center" width="5%"><img src="<?php 
echo $rows['userphoto'];?>" alt="" border=3 height=30 width=30></img></td>
<td width="95%"><table width="100%" border="0" align="right" cellpadding="3" cellspacing="1" bordercolor="1" bgcolor="#FFFFFF">
<tr>
<td bgcolor="#ccc"><strong>RE :</strong></td>
</tr>
<tr>
<td bgcolor="#ccc" align="left"><?php echo "by ".$rows['user']."  -    ".$rows['a_datetime']; ?></td>
</tr>  
<tr>
<td bgcolor="#F8F7F1" height="75%"> <p><?php echo $rows['a_answer']; ?></p>
  <p>&nbsp;</p></td>
</tr>

</table></td>
</tr>
</table>
</td>
</tr>
</table><br>
  
<?php
}
 
$sql3="SELECT view FROM $tbl_name WHERE id='$id'";
$result3=mysql_query($sql3);
$rows=mysql_fetch_array($result3);
$view=$rows['view'];
 
// if have no counter value set counter = 1
if(empty($view)){
$view=1;
$sql4="INSERT INTO $tbl_name(view) VALUES('$view') WHERE id='$id'";
$result4=mysql_query($sql4);
}
 
// count more value
$addview=$view+1;
$sql5="update $tbl_name set view='$addview' WHERE id='$id'";
$result5=mysql_query($sql5);
mysql_close();
?>
 
<BR>
<table width="600" border="2" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="viewtopic2">
<tr>
<form name="form1" method="post" action="add_answer.php">
<td>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td valign="top"><strong>Answer</strong></td>
<td valign="top">:</td>
<td><textarea name="a_answer" cols="60" rows="7" id="a_answer"  required></textarea></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input name="id" type="hidden" value="<?php echo $id; ?>"></td>
<td><input type="submit" name="Submit" value="Submit" id="answer"> </td>
</tr>
</table>
</td>
</form>
</tr>
</table>
</div>
<p>&nbsp;</p>
<p class="backto">  	<a href="forum.php">&lt;&lt;BACK TO FORUM</a></p>

</body>