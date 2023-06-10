<?php
include("SessionValidator.php");
include("../Assets/Connection/Connection.php");
if(isset($_POST["btnsave"]))
{
	$name=$_POST["txtname"];
	$details=$_POST["txtdetails"];
	$price=$_POST["txtprice"];
	$type=$_POST["txttype"];
	$brand=$_POST["txtbrand"];
	$subcategory=$_POST["txtsubcategory"];
	
	
	
	$photo=$_FILES["photo"]["name"];
	$temp=$_FILES["photo"]["tmp_name"];
	
	
	move_uploaded_file($temp,'../Assets/File/Shop/'.$photo);
	
	
	
		$insqry="insert into tbl_product(product_name,product_details,product_photo,product_price,subcategory_id,brand_id,type_id,shop_id)values('".$name."','".$details."','".$photo."','".$price."','".$subcategory."','".$brand."','".$type."','".$_SESSION["sid"]."')";

			if($conn->query($insqry))
			{
				?>
					<script>
                    alert("Inserted..")
					//location.href="Product.php";
                    </script>
					<?php
			}
			else
			{
				?>
					<script>
                    alert("Failed..")
					//location.href="Product.php";
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
<title>User Registration</title>
</head>

<body>
<div id="tab" align="center">
<form id="form1" name="form1" enctype="multipart/form-data" method="post" action="" >

<table>
<tr align="center">
    <td><p>Category</p></td>
    <td>
      <select name="txtcat" id="txtcat" onChange="getcategory(this.value)">
        
        <option>----Select----</option>
        <?php
		$selqry="select * from tbl_category";
		$re=$conn->query($selqry);
		while($row=$re->fetch_assoc())
		{
			?>
        <option value="<?php echo $row["category_id"];?>"><?php echo $row["category_name"];?></option>
        <?php
		}
		?>
      </select></td>
  </tr>
  <tr align="center">
    <td>Subcategory</td>
    <td>
      <select name="txtsubcategory" id="txtsubcategory">
      <option value="">---select---</option>
      </select></td>
  </tr>
  <tr align="center">
    <td><p>Type</p></td>
    <td>
      <select name="txttype" id="txttype" >
        
        <option>----Select----</option>
        <?php
		$selqry="select * from tbl_type";
		$re=$conn->query($selqry);
		while($row=$re->fetch_assoc())
		{
			?>
        <option value="<?php echo $row["type_id"];?>"><?php echo $row["type_name"];?></option>
        <?php
		}
		?>
      </select></td>
  </tr>
   <tr align="center">
    <td><p>Brand</p></td>
    <td>
      <select name="txtbrand" id="txtbrand">
        
        <option>----Select----</option>
        <?php
		$selqry="select * from tbl_brand";
		$re=$conn->query($selqry);
		while($row=$re->fetch_assoc())
		{
			?>
        <option value="<?php echo $row["brand_id"];?>"><?php echo $row["brand_name"];?></option>
        <?php
		}
		?>
      </select></td>
  </tr>

  <tr align="center">
    <td width="164">Name</td>
    <td width="116"><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" required /></td>
  </tr>
  <tr align="center">
    <td><p>Details</p></td>
    <td><label for="txtdetails"></label>
      <input type="text" name="txtdetails" id="txtdetails" required/></td>
  </tr>
  <tr align="center">
    <td width="164">Price</td>
    <td width="116"><label for="txtprice"></label>
      <input type="text" name="txtprice" id="txtprice" required /></td>
  </tr>
   <tr align="center">
    <td>Photo</td>
    <td> <input type="file" name="photo" id="photo" /></td>
  </tr>
  <tr align="center">
    <td colspan="2"><div align="center">
      <input type="submit" name="btnsave" id="btnsave" value="Submit" />
    </div></td>
    </tr>
</table>
</form>
</br></br></br></br>
<table>
    <tr align="center">
      <td>Si.no</td> 
      <td>Product Name</td>
      <td>Product Details</td>
      <td>Price</td>
      <td>Photo</td>
      <td>Sub Category</td>
      <td>Type</td>
      <td>Brand</td> 
      <td colspan="2"><div align="center">Action</div></td>
         
    
    </tr>
<?php
$i=0;

$selqry = "select * from tbl_product p inner join tbl_subcategory s on p.subcategory_id=s.subcategory_id inner join tbl_type t on p.type_id=t.type_id inner join tbl_brand b on p.brand_id=b.brand_id where shop_id='".$_SESSION["sid"]."'"; 
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
            <?php echo $row["product_name"];?>
            </td>     
              <td>
            <?php echo $row["product_details"];?>
            </td>     
              <td>
            <?php echo $row["product_price"];?>
            </td>     

              <td><img src="../Assets/File/Shop/<?php echo $row["product_photo"];?>" width="50" height="50" />
            
            </td>           
            <td>
            <?php echo $row["subcategory_name"];?>
            </td> 
             <td>
            <?php echo $row["type_name"];?>
            </td>  
              <td>
            <?php echo $row["brand_name"];?>
            </td>
            <td align="center">
        <a href="Stock.php?m=<?php echo $row["product_id"];?>">Stock</a></td>
            </tr>
        <?php
	}

   

?>
</table>
<script src="../Assets/JQ/jQuery.js"></script> 
<script >
function getcategory(did)
{

	$.ajax({
	  url:"../Assets/Ajaxpages/Ajaxcategory.php?did="+did,
	  success: function(html){
		$("#txtsubcategory").html(html);
	  }
	});
}

</script>
</div>
</body>
<?php
include("Foot.php");
?>
</html>
