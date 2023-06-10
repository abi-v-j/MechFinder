<?php
include("../Assets/Connection/Connection.php");	
include("Head.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Shop</title>
</head>

<body>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr align="center">
     
      <td><label for="seldistrict"></label>
        <select name="seldistrict" id="seldistrict" onChange="getPlace(this.value)">
        <option>----District----</option>
        <?php
		$selqry="select * from tbl_district";
		$re=$conn->query($selqry);
		while($row=$re->fetch_assoc())
		{
			?>
            <option value="<?php echo $row["district_id"];?>"><?php echo $row["district_name"];?></option>
            <?php
		}
		?>
      </select></td>
   
      <td><label for="txtplace"></label>
      <select name="txtplace" id="txtplace" onChange="getLocation(this.value)">
      <option value="">---Place---</option>
      </select></td>
    
      <td><label for="txtlocation"></label>
      <select name="txtlocation" id="txtlocation">
      <option value="">---Location---</option>
      </select></td>
 
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsave" id="btnsave" value="Search" />
      </div></td>
    </tr>
  </table>
  <?php
  if(isset($_POST["btnsave"]))
{
	$location=$_POST["txtlocation"];
	?>
    <br /><br />
	<table>
    <tr align="center">
    
  
<?php
$i=0;

 $selqry = "select * from tbl_shop s inner join tbl_location l on s.shop_location=l.location_id inner join tbl_place p on p.place_id=l.place_id inner join tbl_district d on d.district_id=p.district_id where shop_status='1' and location_id='".$location."' "; 
$result=$conn->query($selqry);
if(mysqli_num_rows($result)==0)
{
	?>
    <h1 align="center">No workshop Found</h1>
    <?php
}
else
{

while($row = $result->fetch_assoc())
{
	$i++;
?>
		<td align="center">
<p style="padding:30px;">

<img src="../Assets/File/Shop/<?php echo $row["shop_logo"];?>" width="150" height="150" /><br /><br /><br />
Name:<?php echo $row["shop_name"];?><br />
Email:<?php echo $row["shop_email"];?><br />
Address:<?php echo $row["shop_address"];?><br />
Place:<?php echo $row["place_name"];?><br />
Location:<?php echo $row["location_name"];?><br />
<a href="SearchProduct.php?sid=<?php echo $row["shop_id"];?>">Search Product</a><br />
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

</td>
      
            
           
            
             
        <?php
	}
?>
   </tr>
 </table>
    <?php
	

   
}
}
?>
</form>


<script src="../Assets/JQ/jQuery.js"></script> 
<script >
function getPlace(did)
{

	$.ajax({
	  url:"../Assets/Ajaxpages/Ajaxplace.php?did="+did,
	  success: function(html){
		$("#txtplace").html(html);
	  }
	});
}

</script>
<script >
function getLocation(did)
{

	$.ajax({
	  url:"../Assets/Ajaxpages/Ajaxlocation.php?did="+did,
	  success: function(html){
		$("#txtlocation").html(html);
	  }
	});
}

</script>

</body>
<?php
include("../WorkShop/Foot.php");
?>
</html>
