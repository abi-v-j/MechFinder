<?php
session_start();
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btn_sub"]))
{
	$reply=$_POST["txt_reply"];
	$update="update tbl_feedback set feedback_reply='".$reply."' where feedback_id='".$_GET["del"]."'";
	if($conn->query($update))
	{	
			        ?>
						<script>
                        window.location='ViewFeedback.php';
                        </script>
                    <?php
			}
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Replyfeedback</title>

</head>

<body>
<div id="tab">
<h1 align="center">Reply</h1>
<br/><br/>
<form id="form1" name="form1" method="post" action="">
<table border="1" align="center" cellpadding="10">
  <tr align="center">
		
    <td align="center">Reply</td>
    <td><textarea name="txt_reply" id="txt_reply" cols="45" rows="5"></textarea></td>
  </tr>
  <tr align="center">
		
    <td  colspan="2" align="center"><input type="submit" name="btn_sub" id="btn_sub" value="Submit" />&nbsp;&nbsp;&nbsp;
       <input type="reset" name="btn_can" id="btn_can" value="Cancel" /></td>
    </tr>
</table>

</form>
</div>
</body>
<?php
include("Foot.php");
?>
</html>