<?php
include("SessionValidator.php");
include("../Assets/Connection/Connection.php");
if(isset($_GET["m"]))
{
	$_SESSION["m"]=$_GET["m"];
}

if(isset($_POST["btnsave"]))
{
	$qty=$_POST["txtqty"];
	
			
				$insqry="insert into tbl_stock(stock_qty,stock_date,product_id)values('".$qty."',curdate(),'".$_SESSION["m"]."')";
				if($conn->query($insqry))
				{		
					header("Location:Stock.php");
				}
				
			
		
		
}
include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Stock</title>
</head>

<body>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr align="center">
      <td>Quantity</td>
      <td><label for="txtqty"></label>
      <input type="text" name="txtqty" id="txtqty" required="required" autocomplete="off" /></td>
    </tr>
    <tr align="center">
      <td colspan="2">
        <input type="submit" name="btnsave" id="btnsub" value="Save" />
      </td>
    </tr>
  </table>
  </form>
  <br /><br/>
  <table border="1" align="center" cellpadding="5">
    <tr align="center">
      <td>Si.no</td>
       <td>Date</td>
      <td>Quantity</td>
      
    </tr>
   
    
<?php
$i=0;

$selqry = "select * from tbl_stock s inner join tbl_product p on s.product_id=p.product_id where p.product_id='".$_SESSION["m"]."'";
$result=$conn->query($selqry);
while($row = $result->fetch_assoc())
{
	$i++;
?>
		<tr align="center">
        	<td>
            <?php echo $i;?>
            </td>
            <td>
            <?php echo $row["stock_date"];?>
            </td>   
            <td>
            <?php echo $row["stock_qty"];?>
            </td>           
       		</tr>
        <?php
}

?>    

   
  </table>
  
</div>
</body>
<?php
include("Foot.php");
?>
</html>