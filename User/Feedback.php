<?php
session_start();

include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
  
  $content=$_POST["txt_content"];
  $insqry="insert into tbl_feedback(feedback_content,user_id,feedback_date)values('".$content."','".$_SESSION["uid"]."',curdate())";   
  if($conn->query($insqry))
{
?>
<script>
alert('inserted');
location.href='Feedback.php';
</script>
<?php  
}
else
{
?>
<script>
alert('failed');
location.href='Feedback.php';
</script>
<?php
}
}

include("Head.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Feedback </title>
</head>

<body>
<div id="tab">
<h1 align="center">FeedBack</h1><br /><br />
  <form id="form1" name="form1" method="post" action="">
  <table align="center" border="1" cellpadding="10">
    <tr align="center">
      <td>Content</td>
      <td><label for="txt_content"></label>
      <textarea name="txt_content" id="txt_content" cols="45" rows="5"></textarea></td>
    </tr>
    <tr align="center">
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />&nbsp;&nbsp;
         <input type="reset" name="btn_reset" id="btn_reset" value="Cancel" />
      </div></td>
    </tr>
  </table>
  <br /><br />
  <table align="center" border="1" cellpadding="10">
    <tr align="center">
      <th>Sl.No</th>
       <th>Name</th>
        <th>Date</th>
      <th>Content</th>     
      <th>Reply</th>
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
       <td><?php echo $row["feedback_date"] ?></td>
      <td><?php echo $row["feedback_content"] ?></td>     
      <td><?php echo $row["feedback_reply"] ?></td>
    </tr>
    <?php
	}
	
	?>
  </table>
  <p>&nbsp;</p>

</form>

</div>
</body>
<?php
include("Foot.php");
?>
</html>