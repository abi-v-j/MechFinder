<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btnsave"]))
{
	$category=$_POST["txtcategory"];
	$sel="select * from tbl_category where category_name='".$category."'";
		$re=$conn->query($sel);
		
		
		if($row= $re->fetch_assoc())
		{
			        ?>
						<script>
                        alert('Already Exist');
                        window.location='Category.php';
                        </script>
                    <?php
		}
		else
		{
			
				$insqry="insert into tbl_category(category_name)values('".$category."')";
				if($conn->query($insqry))
				{		
			        ?>
						<script>
                        window.location='Category.php';
                        </script>
                    <?php
						}
			}
		
}

if(isset($_GET["m"]))
{
	$delqry="delete from tbl_category where category_id='".$_GET["m"]."'";
	$conn->query($delqry);
			        ?>
						<script>
                        window.location='Category.php';
                        </script>
                    <?php
		}

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CATEGORY</title>
</head>

<body>
<div id="tab">
<h1 align="center">Category</h1>
<br/><br/>
<form id="form1" name="form1" method="post" action="">
  <table cellpadding="5" border="1" align="center">
    <tr align="center">
      <td>Category</td>
      <td width="185"><label for="txtdis"></label>
      <input type="text" name="txtcategory" id="txtcategory" required autocomplete="off" /></td>
    </tr>
    <tr align="center">
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsave" id="btnsub" value="Save" />
      </div></td>
    </tr>
  </table>

  <br /><br/>
  <table border="1" align="center" cellpadding="15">
    <tr align="center">
      <th>Si.no</th>
      <th>Category</th>
      <th colspan="2"><div align="center">Action</div></th>
    </tr>
   
    
<?php
$i=0;

$selqry = "select * from tbl_category";
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
        <a href="Category.php?m=<?php echo $row["category_id"];?>">Delete</a></td></tr>
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
