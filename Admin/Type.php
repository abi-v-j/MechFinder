<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btnsave"]))
{
	$type=$_POST["txttype"];
	$sel="select * from tbl_type where type_name='".$type."'";
		$re=$conn->query($sel);
		
		
		if($row= $re->fetch_assoc())
		{
			        ?>
						<script>
                        alert('Already Exist');
                        window.location='Type.php';
                        </script>
                    <?php
				}
		else
		{
			
				$insqry="insert into tbl_type(type_name)values('".$type."')";
				if($conn->query($insqry))
				{		
			        ?>
						<script>
                        window.location='Type.php';
                        </script>
                    <?php
						}
				
			
			}
		
}

if(isset($_GET["del"]))
{
	$delqry="delete from tbl_type where type_id='".$_GET["del"]."'";
	$conn->query($delqry);
			        ?>
						<script>
                        window.location='Type.php';
                        </script>
                    <?php
		}

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Type</title>
</head>

<body>
<h1 align="center">Vehicle Type</h1>
<br/><br/>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table width="323" border="1" cellpadding="5" align="center">
    <tr align="center">
      <td width="147">Vehicle Type</td>
      <td width="144"><input type="text" name="txttype" id="txttype" required autocomplete="off" /></td>
    </tr>
    <tr align="center">
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsave" id="btnsave" value="Submit" />
      </div></td>
    </tr>
  </table>
  <br /> <br /> <br /> 
  <br />
   <table  border="1"al align="center"cellpadding="5">
    <tr align="center">
      <th>Sl.no</th>
      <th>Vehicle Type</th>
      <th colspan="2"><div align="center">Action</div></th>
    </tr>
   
    
<?php
$i=0;

$selqry = "select * from tbl_type";
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
            <?php echo $row["type_name"];?>
            </td>           
       		<td width="132"colspan="2"align="center">
        <a href="Type.php?del=<?php echo $row["type_id"];?>">Delete</a></td></tr>
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