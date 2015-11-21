<?php include 'header.php'; ?> 
<link rel="stylesheet" type="text/css" href="css/forum.css" >

<style type="text/css">

#newdiscuss
{
	border-width:4px;
	
	border-color:#999;
	cursor:hand;
}


</style>
</head>

<body >

<?php
include "database/dbconnect.php";
$sql="SELECT * FROM fquestions ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
$colorchange=0;
$bgcolor="";
?>
<div class="createtabel">
<table border="0" bordercolor="#666666">
<tr>
<td>
<table width="1100" height="107" align="center" cellpadding="3" cellspacing="0" border="0" >
<tr >
<td colspan="7" align="center"><form method="post" action="new_topic.php"><input id="newdiscuss" type="submit" value="Add a new discussion topic"></form></td>
</tr>
<tr>
<td width="30%" align="center" bgcolor="#999"><strong>Discussion</strong></td>
<td width="30%" align="center" bgcolor="#999"><strong>Started by</strong></td>
<td width="15%" align="center" bgcolor="#999"><strong>Views</strong></td>
<td width="15%" align="center" bgcolor="#999"><strong>Replies</strong></td>
<td width="10%" align="center" bgcolor="#999"><strong>Date/Time</strong></td>
</tr>
 
<?php
 
while($rows = mysqli_fetch_array($result)){
	$colorchange=$colorchange+1;
	if($colorchange%2==1)
	{
		$bgcolor="#fff";
	}
	else
	{
		$bgcolor="#EEE";}
?>
<tr>
<td bgcolor="<?php echo $bgcolor?>" align="left" ><a href="view_topic.php?id=<?php echo $rows['id']; ?>"><strong><?php echo $rows['topic']; ?></strong></a><BR></td>
<td align="center" bgcolor="<?php echo $bgcolor	?>"><?php echo $rows['user'];?></td>
<td align="center" bgcolor="<?php echo $bgcolor	?>"><?php echo $rows['view']; ?></td>
<td align="center" bgcolor="<?php echo $bgcolor	?>"><?php echo $rows['reply']; ?></td>
<td align="center" bgcolor="<?php echo $bgcolor	?>"><?php echo $rows['datetime']; ?></td>
</tr>
 
<?php
}
mysqli_close($conn);

?>
</table>
</td>
</tr>
</table>
</div>
</body>