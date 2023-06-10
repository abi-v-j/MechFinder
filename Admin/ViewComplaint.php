
<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint</title>
</head>

<body>
<div id="tab" align="center">
<h1 align="center">User</h1>
 <table  width="80%" border="1"align="center"cellpadding="5">
    <tr align="center">
		
      <th>Sl.no</th>
      <th>Name</th>
       <th>Email</th>
        <th>Content</td>
         <th>Type</th>
      <th colspan="2"><div align="center">Action</div></th>
    </tr>
   
    
<?php
$i=0;

$selqry = "select * from tbl_complaint c inner join tbl_user u on c.user_id=u.user_id inner join tbl_complainttype m on c.complainttype_id=m.complainttype_id";
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
            <?php echo $row["user_email"];?>
            </td> 
             <td>
            <?php echo $row["complaint_content"];?>
            </td> 
            <td>
            <?php echo $row["complainttype_name"];?>
            </td>           
       		<td width="132"colspan="2"align="center">
            
            
            <?php
        if($row["complaint_status"]==0)
			{
				?>
                <a href="Reply.php?del=<?php echo $row["complaint_id"];?>">Reply</a>
                <?php
			}
			else
			{
				echo $row["complaint_reply"];
			}
			?>
            
        
        </td></tr>
        <?php
}

?>   

   
  </table>
  <br /> <br /> <br /> <br /> 
  <h1 align="center">Shop</h1>
  <table border="1"align="center"cellpadding="5">
    <tr align="center">
		
       <th>Sl.no</th>
      <th>Name</th>
       <th>Email</th>
        <th>Content</td>
         <th>Type</th>
      <th colspan="2"><div align="center">Action</div></th>
    </tr>
   
    
<?php
$i=0;

$selqry = "select * from tbl_complaint c inner join tbl_shop u on c.shop_id=u.shop_id inner join tbl_complainttype m on c.complainttype_id=m.complainttype_id";
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
            <?php echo $row["shop_name"];?>
            </td> 
             <td>
            <?php echo $row["shop_email"];?>
            </td> 
             <td>
            <?php echo $row["complaint_content"];?>
            </td> 
            <td>
            <?php echo $row["complainttype_name"];?>
            </td>           
       		<td width="132"colspan="2"align="center">
            <?php
        if($row["complaint_status"]==0)
			{
				?>
                <a href="Reply.php?del=<?php echo $row["complaint_id"];?>">Reply</a>
                <?php
			}
			else
			{
				echo $row["complaint_reply"];
			}
			?>
            
        
        </td></tr>
        <?php
}

?>   

   
  </table>
  <br /> <br /> <br /> <br />
  <h1 align="center">Workshop</h1> 
  <table width="80%"  border="1" align="center" cellpadding="5">
    <tr align="center">
		
       <th>Sl.no</th>
      <th>Name</th>
       <th>Email</th>
        <th>Content</td>
         <th>Type</th>
      <th colspan="2"><div align="center">Action</div></th>
    </tr>
   
    
<?php
$i=0;

$selqry = "select * from tbl_complaint c inner join tbl_workshop u on c.workshop_id=u.workshop_id inner join tbl_complainttype m on c.complainttype_id=m.complainttype_id";
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
            <?php echo $row["workshop_name"];?>
            </td> 
             <td>
            <?php echo $row["workshop_email"];?>
            </td> 
             <td>
            <?php echo $row["complaint_content"];?>
            </td> 
            <td>
            <?php echo $row["complainttype_name"];?>
            </td>           
       		<td width="132"colspan="2"align="center">
            <?php
        if($row["complaint_status"]==0)
			{
				?>
                <a href="Reply.php?del=<?php echo $row["complaint_id"];?>">Reply</a>
                <?php
			}
			else
			{
				echo $row["complaint_reply"];
			}
			?>
            
        
        
        </td></tr>
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