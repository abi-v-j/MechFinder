<?php
include("SessionValidator.php");
include("../Assets/Connection/Connection.php");		

	if(isset($_GET["ch"]))
	{
		
		$up = "update tbl_request set request_status='4' where request_id='".$_GET["ch"]."'" ;
		
		if($conn->query($up))
		{
			header("Location:ViewAssignedWork.php");
		}
		else
		{
			echo "<script>alert('Failed')</script>";
			
		}
	}
	 
	 
	
	if(isset($_POST["btn_update"]))
	{
		
		
		$file=$_FILES["file_bill"]["name"];
		$temp=$_FILES["file_bill"]["tmp_name"];
		move_uploaded_file($temp,'../Assets/File/Bill/'.$file);
		
		
		
		$up = "update tbl_request set request_status='5',request_bill='".$file."' where mechanic_id='".$_GET["mh"]."'" ;
		
		if($conn->query($up))
		{
			header("Location:ViewAssignedWork.php");
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
<title>View Assigned Work</title>
</head>
<body>
<div id="tab">
<h1 align="center">View Assigned Work</h1>

 <p>&nbsp;</p>
 <p>&nbsp;	</p>
 <?php
 if(isset($_GET["mh"]))
 {
	 ?>
     <form id="form1" name="form1" enctype="multipart/form-data" method="post" action="">
 <table align="center"> 
    <tr align="center">
     <td>Bill</td>
     <td>
       <input type="file" name="file_bill" id="file_bill" />
       <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $_GET["mh"]?>" />
     </td>
   </tr>
   <tr align="center">
     <td colspan="2" align="center"><input type="submit" name="btn_update" id="btn_update" /></td>
   </tr>
 </table>
 </form>
     <?php
 }
 
 ?>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <table  border="1" align="center" cellpadding="5">
    <tr align="center">
      <td>Si.no</td> 
      <td> User Name</td>
       <td>Contact</td>
        <td>Details</td>
      <td colspan="2"><div align="center">Action</div></td>
    </tr>
<?php
$i=0;

$selqry = "select * from tbl_request r  inner join tbl_user u  on r.user_id=u.user_id  where r.mechanic_id='".$_SESSION["mid"]."' and request_status > 2"; 
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
            <?php echo $row["user_contact"];?>
            </td>     
              <td>
            <?php echo $row["request_details"];?>
            </td>     
            <td align="center" colspan="2">
          
            <?php
					
					 if($row["request_status"]=="3")
					{
						?>
                       <a href="ViewAssignedWork.php?ch=<?php echo $row["request_id"];?>">Start</a>&nbsp;&nbsp;
                     		 <?php
					}

else if($row["request_status"]=="4")
					{
						?>
            <a href="ViewAssignedWork.php?mh=<?php echo $row["mechanic_id"];?>">Finish</a>
                     		 <?php
					}			
					else if($row["request_status"]==5)
					{
						echo "Waiting for Payment";
					}	
					else if($row["request_status"]==6)
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
</div>
</body>
<?php
include("Foot.php");
?>
</html>