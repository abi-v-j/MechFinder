<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Accepted Request</title>
</head>

<body>
<div id="tab" align="center">
<h1 align="center">Accepted List</h1>
<table>
   <tr align="center">
      <td>Si.no</td> 
      <td>Name</td>
       <td>Date</td>
        <td>Detail</td>
         <td>Action</td>
     
    </tr>
<?php
$i=0;

$selqry = "select * from tbl_request r inner join tbl_user u on r.user_id=u.user_id  where request_status='1'"; 
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
             <td><a href="AssignMechanic.php?ch=<?php echo $row["request_id"];?>">Assign</a></td> 
            </tr>
        <?php
}

?>    

</body>
<?php
include("Foot.php");
?>
</html>
