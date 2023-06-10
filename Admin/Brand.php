<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btnsave"]))
{
	$brand=$_POST["txtbrand"];
	$sel="select * from tbl_brand where brand_name='".$brand."'";
		$re=$conn->query($sel);
		
		
		if($row= $re->fetch_assoc())
		{
			?>
		<script>
		alert('Already Exist');
		window.location='Brand.php';
        </script>
		<?php
		}
		else
		{
			
				$insqry="insert into tbl_brand(brand_name)values('".$brand."')";
				if($conn->query($insqry))
				{		
					?>
						<script>
                        window.location='Brand.php';
                        </script>
                    <?php
				}
				
			
			}
		
}

if(isset($_GET["m"]))
{
	$delqry="delete from tbl_brand where brand_id='".$_GET["m"]."'";
	$conn->query($delqry);
				        ?>
						<script>
                        window.location='Brand.php';
                        </script>
                    <?php
		
}

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Brand</title>
</head>

<body>
<h1 align="center">Brand</h1>
<br/><br/>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" cellpadding="5">
    <tr align="center">
      <td height="46">Brand</td>
      <td ><label for="txtdis"></label>
      <input type="text" name="txtbrand" id="txtbrand" required autocomplete="off" /></td>
    </tr>
    <tr align="center">
      <td height="28" colspan="2"><div align="center">
        <input type="submit" name="btnsave" id="btnsub" value="Save"  />
      </div></td>
    </tr>
  </table>
  <br /><br/>
  <table border="1" align="center" cellpadding="5">
    <tr align="center">
      <th>Si.no</th>
      <th >Brand</th>
      <th colspan="2"><div align="center">Action</div></th>
    </tr>
   
    
<?php
$i=0;

$selqry = "select * from tbl_brand";
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
            <?php echo $row["brand_name"];?>
            </td>   
            <td>        
        <a href="Brand.php?m=<?php echo $row["brand_id"];?>">Delete</a></td></tr>
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
