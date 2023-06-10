<?php
session_start();
include("../Assets/Connection/Connection.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Feedback </title>
</head>
<?php
include("Head.php");
?>

<body>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
    <h1 align="center" >User</h1>
  <table border="1" cellpadding="10">
    <tr align="center">
		
      <th>Sl.No</th>
      <th>Name</th>
     <th>Feedback</th>
      <th>Reply</th>
      <th>Action</th>
     
    
    </tr>
    
	 <?php 
	$selqry="select * from tbl_feedback f inner join tbl_user u on u.user_id=f.user_id";
	
	$res=$conn->query($selqry);
	$i=0;
	while($row=$res->fetch_assoc())
	{
		$i++;
		?>
        <tr align="center">
		
        
        
      <td><?php echo $i;?></td>
      <td><?php echo $row["user_name"] ?></td>
      <td><?php echo $row["feedback_content"] ?></td>
       <td><?php echo $row["feedback_reply"] ?></td>
      <td> <a href="Replyfeedback.php?del=<?php echo $row["feedback_id"];?>">Reply</a></td>
  

    </tr>
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