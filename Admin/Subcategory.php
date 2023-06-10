<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btnsave"]))
{
	$category=$_POST["selcategory"];
	$subcategory=$_POST["txtsubcategory"];
	$sel="select * from tbl_subcategory where subcategory_name='".$subcategory."'";
		$re=$conn->query($sel);
		
		
		if($row= $re->fetch_assoc())
		{
			        ?>
						<script>
                        alert('Already Exist');
                        window.location='Subcategory.php';
                        </script>
                    <?php
				}
		else
		{
			
				$insqry="insert into tbl_subcategory(subcategory_name,category_id)values('".$subcategory."','".$category."')";
				if($conn->query($insqry))
				{		
			        ?>
						<script>
                        window.location='Subcategory.php';
                        </script>
                    <?php
						}
				
			
			}
		
}

if(isset($_GET["m"]))
{
	$delqry="delete from tbl_subcategory where subcategory_id='".$_GET["m"]."'";
	$conn->query($delqry);
			        ?>
						<script>
                        window.location='Subcategory.php';
                        </script>
                    <?php
		}

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SUB CATEGORY</title>
</head>

<body>
<h1 align="center">Subcategory</h1>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table  border="1" align="center" cellpadding="5">
    <tr align="center">
      <td>Category</td>
      <td><label for="selcategory"></label>
        <select name="selcategory" id="selcategory">
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
      <td><label for="txtsubcategory"></label>
      <input type="text" name="txtsubcategory" id="txtsubcategory" required autocomplete="off"/></td>
    </tr>
    <tr align="center">
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsave" id="btnsave" value="Save" />
      </div></td>
    </tr>
  </table>
  </form>

 <br /> <br /> <br /> 
   <table border="1" align="center" cellpadding="10">
    <tr align="center">
      <th>Si.no</th>
      <th>Category</th>
      <th>Subcategory</th>
      <th colspan="2"><div align="center">Action</div></th>
    </tr>
   
    
<?php
$i=0;

$selqry = "select * from tbl_subcategory s inner join tbl_category c on s.category_id=c.category_id";
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
            <?php echo $row["category_name"];?>
            </td>   
             <td>
            <?php echo $row["subcategory_name"];?>
            </td>   
                  
       		<td align="center">
        <a href="Subcategory.php?m=<?php echo $row["subcategory_id"];?>">Delete</a></td></tr>
        <?php
}

?>   

   
  </table>
</body>
</div>
<?php
include("Foot.php");
?>
</html>