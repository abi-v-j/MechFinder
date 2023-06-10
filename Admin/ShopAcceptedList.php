<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_GET["mh"]))
	{
		
	$up = "update tbl_shop set shop_status='2' where shop_id='".$_GET["mh"]."'" ;
	
	
	if($conn->query($up))
	{
		?>
		<script>
		window.location='ShopAcceptedList.php';
        </script>
		<?php

	}
	else
	{
		
						?>
							<script>
                            alert('Failed');
                            window.location='ShopAcceptedList.php';
                            </script>
						<?php
						
	}
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shop Accepted List</title>
</head>

<body>
<h1 align="center">Accepted List</h1>
<div id="tab">
<table  border="1" align="center" cellpadding="5" width="80%">
    <tr align="center">
      <th>Si.no</th> 
      <th>Name</th>
       <th>Contact</th>
        <th>Email</th>
         <th>Address</th>
          <th>Photo</th>
           <th>Proof</th>
      
       <th>District</th>
        <th>Place</th> 
         <th>Location</th>
                                         <th  colspan="2"><div align="center">Action</div></th>

     
    </tr>
<?php
$i=0;

$selqry = "select * from tbl_shop s inner join tbl_location l on s.shop_location=l.location_id inner join tbl_place p on p.place_id=l.place_id inner join tbl_district d on d.district_id=p.district_id where shop_status='1'"; 
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
            <?php echo $row["shop_contact"];?>
            </td>     
              <td>
            <?php echo $row["shop_email"];?>
            </td>     
              <td>
            <?php echo $row["shop_address"];?>
            </td>     
              <td><img src="../Assets/File/Shop/<?php echo $row["shop_logo"];?>" width="50" height="50" />
            
            </td>      
             <td>
           <img src="../Assets/File/Shop/<?php echo $row["shop_proof"];?>" width="50" height="50" />
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
            <td align="center">
            <a href="ShopAcceptedList.php?mh=<?php echo $row["shop_id"];?>">Reject</a>
            </td>
            </tr>
        <?php
}

?>
</div>    
</table>
</body>
<?php
include("Foot.php");
?>
</html>
