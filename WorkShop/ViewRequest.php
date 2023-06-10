<?php
include("../Assets/Connection/Connection.php");		
	
		
	if(isset($_GET["ch"]))
	{
		
		$up = "update tbl_request set request_status='1' where request_id='".$_GET["ch"]."'" ;
		
		if($conn->query($up))
		{
			echo "<script>alert('Updated')</script>";
			header("Location:ViewRequest.php");
		}
		else
		{
			echo "<script>alert('Failed')</script>";
			
		}
	}
	if(isset($_GET["mh"]))
	{
		
	$up = "update tbl_request set request_status='2' where request_id='".$_GET["mh"]."'" ;
	
	
	if($conn->query($up))
	{
		echo "<script>alert('Updated')</script>";
		header("Location:ViewRequest.php");
	}
	else
	{
		echo "<script>alert('Failed')</script>";
		
	}
	}
	include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Request</title>
</head>
<body>
<div id="tab" align="center">
 <table border="1" align="center" cellpadding="5">
    <tr align="center">
      <td>Si.no</td> 
      <td >Name</td>
       <td>Date</td>
        <td>Detail</td>
      <td colspan="2"><div align="center">Action</div></td>
    </tr>
<?php
$i=0;

$selqry = "select * from tbl_request r inner join tbl_user u on r.user_id=u.user_id "; 
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
            <?php echo $row["user_name"];?>
            </td>     
              <td>
            <?php echo $row["request_date"];?>
            </td>     
              <td>
            <?php echo $row["request_details"];?>
            </td>     
            <td align="center" colspan="2">
           			<?php
                    if($row["request_status"]=="0")
					{
						?>
                        <a href="ViewRequest.php?ch=<?php echo $row["request_id"];?>">Accept</a>&nbsp;&nbsp;

            <a href="ViewRequest.php?mh=<?php echo $row["request_id"];?>">Reject</a>
           
                        <?php
					}
					 if($row["request_status"]=="1")
					{
						?>
                      Accepted |
                       <a href="AssignMechanic.php?mh=<?php echo $row["request_id"];?>">Assign</a>
                        <?php
					}
					 if($row["request_status"]=="2")
					{
						?>
                      Rejected
           
                        <?php
					}
					 if($row["request_status"]=="3")
					{
						$selQry = "select * from tbl_mechanic where mechanic_id='".$row["mechanic_id"]."'"; 
						$resulta=$conn->query($selQry);
						$rowa = $resulta->fetch_assoc();
						
						echo " Assigned To " .$rowa["mechanic_name"];
					}
					 if($row["request_status"]=="4")
					{
						$selQry = "select * from tbl_mechanic where mechanic_id='".$row["mechanic_id"]."'"; 
						$resulta=$conn->query($selQry);
						$rowa = $resulta->fetch_assoc();
						
						echo $rowa["mechanic_name"]." Started Work";
					}
                     if($row["request_status"]=="5")
					{
						echo "Work Completed Waiting For Payment";
					}
					  if($row["request_status"]=="6")
					{
						echo "Completed";
					}
                    
                    
                    ?>
            </td>      
       	</tr>
        <?php
}

?>    

</table>
</body>
<?php
include("Foot.php");
?>
</html>