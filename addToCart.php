<?php
 include "sessioncheck.php";

 class AddtoCart{
	 function addToCart(){
		$partid =  $_POST['partID'];
		$qty = $_POST['quantity'];
	
		$user=$_SESSION['user'];

		include "database/dbconnect.php";
		
		$userquery = "SELECT userID FROM user WHERE username='$user'";
		$result=mysqli_query($conn,$userquery);
		
		$row = mysqli_fetch_array($result);
		$userid = $row['userID'];
		
		$query="INSERT INTO cart (partID,userID,quantity) VALUES('$partid','$userid','$qty')";
		
		$insert = mysqli_query($conn, $query);
	 }
 }
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST['addToCart'])){
		$addtoCart = new AddtoCart();
	$addtoCart->addToCart();
	}
}
 
?>	

<head>
<?php include "header.php";?>

<link rel="stylesheet" type="text/css" href="css/forum.css" >
<style type="text/css">
    #apDiv1 {
        position:center;
        margin-top:75px;
        width:100%;
        height:auto;
        z-index:16;
        background-color: #fff;
        border-radius: 20px;
        //left: 3px;
        margin-left: auto;
    }


</style>
</head>

<body>
    <form>
        <div id="apDiv1">
            <div id="apDiv2">
                <?php
                //if ($_SERVER["REQUEST_METHOD"] == "POST") {

                include "database/dbconnect.php";
                $colorchange = 0;
                $bgcolor = "";


                $found = 0;
                $sql = "SELECT * ";
                $sql .= "FROM part p ";
                $sql .= "INNER JOIN cart c ";
                $sql .= "ON c.userID=p.userID ";

                $sql .= "INNER JOIN vehicle v ";
                $sql .= "ON p.vehicleID=v.vehicleID ";

                $sql .= "ORDER BY c.cardID DESC;";

                $result = mysqli_query($conn, $sql);
                ?>

                <div class="createtable">
                    <table align="center">
                        <tr>
                            <td>
                                <table style="margin-bottom: 10px; margin-top: 10px;" width="1100" height="auto" align="center" cellpadding="2" cellspacing="0">
                                    <tr >
                                        <td colspan="7" align="center"><strong><p style="color:#082606; font-size: 30px; font-weight: 50%">Cart Item</p></strong></td>
                                    </tr>
                                    <tr>
                                        <td width="20%" align="center" bgcolor="#1fca12"><strong>Category</strong></td>
                                        <td width="20%" align="center" bgcolor="#1fca12"><strong>Sub Category</strong></td>
                                        <td width="5%" align="center" bgcolor="#1fca12"><strong>Description</strong></td>
                                        <td width="10%" align="center" bgcolor="#1fca12"><strong>New/Used</strong></td>
                                        <td width="15%" align="center" bgcolor="#1fca12"><strong>Price</strong></td>
                                        <td width="15%" align="center" bgcolor="#1fca12"><strong>Quantity</strong></td>
                                        
                                        <td width="15%" align="center" bgcolor="#1fca12"><strong>Made By</strong></td>
                                        
                                        <!--td width="10%" align="center" bgcolor="#999"><strong>Date/Time</strong></td-->
                                        <td width="15%" align="center" bgcolor="#1fca12"><strong>Remove or View</strong></td>
                                    </tr>
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            $userID = $rows["userID"];
											
											$user=$_SESSION['user'];
		
		$userquery = "SELECT userID FROM user WHERE username='$user'";
		$result=mysqli_query($conn,$userquery);
		
		$row = mysqli_fetch_array($result);
		$userid = $row['userID'];

                                            if ($userID == $userid) {
                                                $found++;
                                                $colorchange = $colorchange + 1;
                                                if ($colorchange % 2 == 1) {
                                                    $bgcolor = "#c9fdc5";
                                                } else {
                                                    $bgcolor = "#50dc45";
                                                }
                                                ?>
                                                <tr>
                                                    <td align="center" bgcolor="<?php echo $bgcolor ?>"><?php echo $rows['category']; ?></td>
                                                    <td align="center" bgcolor="<?php echo $bgcolor ?>"><?php echo $rows['subCategory']; ?></td>
                                                    <td align="center" bgcolor="<?php echo $bgcolor ?>"><?php echo $rows['description']; ?></td>
                                                    <td align="center" bgcolor="<?php echo $bgcolor ?>"><?php echo $rows['newOrUsed']; ?></td>
                                                    <td align="center" bgcolor="<?php echo $bgcolor ?>"><?php echo $rows['price']; ?></td>
                                                    <td align="center" bgcolor="<?php echo $bgcolor ?>"><?php echo $rows['quantity']; ?></td>
                                                    
                                                    <td align="center" bgcolor="<?php echo $bgcolor ?>"><?php echo $rows['madeBy']; ?></td>
                                                    <td bgcolor="<?php echo $bgcolor ?>" align="center" >
                                                        <table><tr>


                                                                <?php
                                                                $id = $rows['cardID'];
                                                                $viewlink = "<a href=\"viewFromCart.php?cardID=" . $id . "\"><span>View</span></a>";
                                                                $dellink = "<a href=\"removeFromCart.php?cardID=" . $id . "\"><span>Remove</span></a>";

                                                                echo '<td><strong>' . $viewlink . '</strong></td><td><strong>' . $dellink . '</strong></td></tr></table>';
                                                                ?>


                                                                </td>
                                                            </tr>


                                                            <?php
                                                        }
                                                    }
                                                }
//}
                                                ?>
                                            </table>
                                        </td>
                                    </tr>
                                </table>

                                <?php
                                if ($found == 0) {
                                    ?>

                                    <div class="notfound">
                                        <table width="1077" bgcolor="#fff">
                                            <tr>
                                                <td width="100%" align="center" bgcolor="#fff"><p>&nbsp;</p>
                                                    <p><strong>Not Founded</strong></p></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <?php
                                }


                                mysqli_close($conn);
                                ?>

                                </div>
                                </div>
                                </form>

                                </body>

