<?php
include("../Assets/Connection/Connection.php");
include("SessionValidator.php");
$viewqry="SELECT * FROM tbl_cart c inner join tbl_tool t on t.tool_id=c.tool_id inner join tbl_booking b on b.booking_id=c.booking_id where b.user_id='".$_SESSION['userid']."'";
$result=$conn->query($viewqry);
if(isset($_GET["id"]))
{
	$delqry="delete from tbl_cart where tool_id='".$_GET["id"]."'";
	if($conn->query($delqry))
	{
			?>
        <script>
		alert('Tool Removed');
		location.href='Viewcart.php';
		</script>
        <?php
	}
	else
	{
			?>
        <script>
		alert('Failed');
		</script>
        <?php
	}
}
include("Head.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Cart</title>
<?php
    if($result->num_rows>0)
	{
        ?>
<form id="form1" name="form1" method="post" action="">
  <table width="818" height="119" border="1" align="center">
    <tr align="center">
      <td width="48">SlNo</td>
      <td width="180">Photo</td>
      <td width="58">Name</td>
      <td width="59">Detail</td>
      <td width="74">Price</td>
      <td width="242">Quantity</td>
      <td width="111">Total</td>
      <td width="111">Action</td>
    </tr>
    <?php
    $i=0;
    while($row=$result->fetch_assoc())
    {
		$i++;
        ?>
         <tr align="center">
      <td><?php echo $i;?></td>
      <td><img  width="150px" src="../Assets/File/Tool/<?php echo $row['tool_photo'];?>"></td>
      <td><?php echo $row["tool_name"];?></td>
      <td><?php echo $row["tool_details"];?></td>
      <td><?php echo $row["tool_rentprice"];?></td>
      <td><input type="number" id="txtqty" name="txtqty"/></td>
      <td>Total</td>
      <td><a href="ViewCart.php?id=<?php echo $row["tool_id"];?>">Remove</a>
    </tr><?php
    }
}
else{
    echo "<h1 align='center'>No Data Found</h1>";
}
?>


  </table>
</form>
<?php
include("Foot.php");
?>