<?php
include("SessionValidator.php");
include("../Assets/Connection/Connection.php");

$selqry="select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_product p on p.product_id=c.product_id inner join tbl_mechanic u on u.mechanic_id=b.mechanic_id where shop_id='".$_SESSION["sid"]."' and booking_status!=0 and cart_status!=0";
$result=$conn->query($selqry);


if(isset($_GET["cid"]))
{
	
	$upQry = "update tbl_cart set cart_status='".$_GET["sts"]."' where cart_id='".$_GET["cid"]."' ";
	
	if($conn->query($upQry))
	{
		?>
        	<script>
            	window.location="OrderDetails.php";
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
<title>Galerie DArt::Order Details</title>
</head>

<body>
<div id="tab" align="center">
<h1>Order Details</h1>
<form id="form1" name="form1" method="post" action="">
  <table border="1">
    <tr align="center">
      <td>SlNO</td>
      <td>Name</td>
      <td>Photo</td>
      <td>Mechanic Name</td>
      <td>Quantity</td>
      <td>Price</td>
      <td>Total amount</td>
      <td>Action</td>
    </tr>
     <?php
	 $i=0;
	while($row=$result->fetch_assoc())
	{
		
		$qty=$row["cart_qty"];
	$price=$row["product_price"];
	$totalamt=$qty*$price;
		 $i++;
  ?>
  <tr align="center">
          <td><?php echo $i; ?></td>
          <td><?php echo $row["product_name"];?></td>
          <td><img src="../Assets/File/Shop/<?php echo $row["product_photo"];?>" width="100" height="100" /></td>
          <td><?php echo $row["mechanic_name"];?></td>
          <td><?php echo $row["cart_qty"];?></td>
          <td><?php echo $row["product_price"];?></td>
          <td><?php echo $totalamt;?></td>
          <td>
          		<?php
                
					if($row["booking_status"]==1 && $row["cart_status"]==0)
					{
						echo "Payment Pending....";
					}
					else if($row["booking_status"]==2 && $row["cart_status"]==1)
					{
						?>
                        Payment Completed / 
                        <a href="OrderDetails.php?cid=<?php echo $row["cart_id"];?>&sts=2">Deliverd</a>
                        <?php
					}
					else if($row["booking_status"]==2 && $row["cart_status"]==2)
					{
						?>
                        Order Completed 
                        <?php
					}
				
				
				?>
          </td>

  </tr>
  <?php
	}
	?>
  </table>
</form>
</div>
</body>
<?php
include("Foot.php");
?>
</html>