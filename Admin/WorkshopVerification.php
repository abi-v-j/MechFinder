<?php
include("../Assets/Connection/Connection.php");
include("Head.php");

	if(isset($_GET["ch"]))
	{
		
	$up = "update tbl_workshop set workshop_status='1' where workshop_id='".$_GET["ch"]."'" ;
	
	if($conn->query($up))
	{
					?>
		<script>
		window.location='WorkshopVerification.php';
        </script>
		<?php
		
	}
	else
	{
					?>
		<script>
		alert('Failed');
		window.location='WorkshopVerification.php';
        </script>
		<?php
		
		
	}
	}
	if(isset($_GET["mh"]))
	{
		
	$up = "update tbl_workshop set workshop_status='2' where workshop_id='".$_GET["mh"]."'" ;
	
	
	if($conn->query($up))
	{
					?>
		<script>
		window.location='WorkshopVerification.php';
        </script>
		<?php
		
	}
	else
	{
					?>
					<script>
                    alert('Failed');
                    window.location='WorkshopVerification.php';
                    </script>
		<?php
		
		
	}
	}
		
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Workshop Verification</title>
</head>
<body>
<div id="tab" align="center">
 <table border="1" align="center" cellpadding="5">
    <tr align="center">
		
      <th >Si.no</th> 
      <th>Name</th>
       <th>Contact</th>
        <th>Email</th>
         <th>Address</th>
          <th>Photo</th>
           <th>Proof</th>
      
       <th>District</th>
        <th>Place</th> 
         <th>Location</th>
      <th colspan="2"><div align="center">Action</div></th>
    </tr>
<?php
$i=0;

$selqry = "select * from tbl_workshop w inner join tbl_location l on w.workshop_location=l.location_id inner join tbl_place p on p.place_id=l.place_id inner join tbl_district d on d.district_id=p.district_id where workshop_status='0'"; 
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
            <?php echo $row["workshop_contact"];?>
            </td>     
              <td>
            <?php echo $row["workshop_email"];?>
            </td>     
              <td>
            <?php echo $row["workshop_address"];?>
            </td>     
              <td><img src="../Assets/File/Workshop/<?php echo $row["workshop_logo"];?>" width="50" height="50" />
            
            </td>      
             <td>
           <img src="../Assets/File/Workshop/<?php echo $row["workshop_proof"];?>" width="50" height="50" />
            </td>       
            <td>
            <?php echo $row["district_name"];?>
            </td> 
             <td>
            <?php echo $row["place_name"];?>
            </td>  
              <td>
            <?php echo $row["location_name"];?>
            </td>
            <td align="center" colspan="2">
            <a href="WorkshopVerification.php?ch=<?php echo $row["workshop_id"];?>">Accept</a>&nbsp;&nbsp;

            <a href="WorkshopVerification.php?mh=<?php echo $row["workshop_id"];?>">Reject</a>
            </td>      
       	</tr>
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