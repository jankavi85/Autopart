<head>
<link rel="stylesheet" type="text/css" href="css/header.css">



<style type="text/css">
.createtabel {
	position: absolute;
	left: 168px;
	top: 222px;
	width: 917px;
	height: 290px;
	z-index :10;
	background-color:#FFF;
	border-radius:20px;
	border-width:3px;
	border-style: solid;
	
	
}


#detail{
	border-style: inset;
	border-width: 3px;
	font-size:14px;
}
#topic{
	border-style: inset;
	border-width: 3px;
	font-size:16px;
	font-family:"Arial Black", Gadget, sans-serif;
}
#submit{
	border-style: outset;
	border-width: 3px;
	cursor:hand;
	background-color: #FC0;
	font-family:"Arial Black", Gadget, sans-serif;
}

.backto {
	font-weight: bold;
	cursor:hand;
}
</style>
</head>

<body bgcolor="#f2f2f2">




<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p class="backto">  	<a href="forum.php">&lt;&lt;BACK TO FORUM</a></p>
<p>&nbsp;</p>
<div class="createtabel">
<table width="822" align="center" cellpadding="0" cellspacing="1" >
  <tr>
    <form id="form1" name="form1" method="post" action="add_new_topic.php">
      <td><table width="100%" border="0" cellpadding="3" cellspacing="1" >
        <tr>
          <td colspan="3" ><strong>Create New Topic</strong></td>
        </tr>
        <tr> <td></td> </tr><tr> <td></td> </tr>
        <tr>
          <td width="14%"><strong>Topic</strong></td>
          <td width="2%">:</td>
          <td width="84%"><input name="topic" type="text" id="topic" size="50%" / required></td>
        </tr>
        <tr> <td></td></tr> <tr> <td></td></tr>
        <tr>
          <td valign="top"><strong>Detail</strong></td>
          <td valign="top">:</td>
          <td><textarea name="detail" cols="75%" rows="10" id="detail" required></textarea></td>
        </tr>
        <tr> <td></td></tr> <tr> <td></td></tr>
        <tr>
          <td>&nbsp;</td>
       
          <td><input type="submit" name="Submit" value="Submit" id="submit"/></td>
        </tr>
      </table></td>
    </form>
  </tr>
</table>
<p>&nbsp;</p>
</div>
</body>
</html>