<?php
include("SessionValidator.php");
include("../Assets/Connection/Connection.php");		
	if(isset($_GET["mh"]))
	{
		$_SESSION["ch"]=$_GET["mh"];
		header("Location:AssignMechanic.php");
	}

	if(isset($_GET["m"]))
	{
		
		$up = "update tbl_request set request_status='3',mechanic_id='".$_GET["m"]."' where request_id='".$_SESSION["ch"]."'" ;
		
		if($conn->query($up))
		{
			echo "<script>alert('Updated')</script>";
			header("Location:ViewRequest.php");
		}
		else
		{
			echo "<script>alert('Failed')</script>";
			
		}
		header("Location:ViewRequest.php");
	}
	include("Head.php");	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Assign Mechanic</title>
</head>

<body>
<div id="tab" align="center">
 <table>
    <tr align="center">
      <td>Si.no</td>
       <td>Name</td>
      <td colspan="2"><div align="center">Action</div></td>
    </tr>
   
    
<?php
$i=0;
$selqry = "select * from tbl_mechanic where workshop_id='".$_SESSION["wid"]."'";
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
            <?php echo $row["mechanic_name"];?>
            </td>      
                  
       		<td align="center">
        <a href="AssignMechanic.php?m=<?php echo $row["mechanic_id"];?>">Assign</a></td></tr>
        <?php
}

?>   

   
  </table>
</body>
<?php
include("Foot.php");
?>
</html>