<?php
include("SessionValidator.php");
include("../Assets/Connection/Connection.php");		
	
	
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
<h1 align="center">View Request</h1><br />
 <table border="1" align="center" cellpadding="5">
    <tr align="center">
      <th>Si.no</th> 
      <th >Name</th>
       <th>Date</th>
        <th>Detail</th>
      <th colspan="2"><div align="center">Action</div></th>
    </tr>
<?php
$i=0;

$selqry = "select * from tbl_request r inner join tbl_user u on r.user_id=u.user_id where u.user_id='".$_SESSION["uid"]."'"; 
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
           <td>
           			 <?php    
					
					 if($row["request_status"]=="0")
					{
						?>
                      Waiting 
                      
                        <?php
					}
                    
					
					 if($row["request_status"]=="1")
					{
						?>
                      Accepted 
                      
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
						echo "Work Completed Waiting For Payment ";
						?><br />
                        <a href="Payment.php?rid=<?php echo $row["request_id"]?>">Payment</a>&nbsp;&nbsp;
                        <?php
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