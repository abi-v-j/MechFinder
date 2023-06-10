<?php
include('../Assets/Connection/Connection.php');
include("SessionValidator.php");
if(isset($_POST['btn_save']))
{
	
	
	
	$currentPassword=$_POST["txt_password"];
	$newPassword=$_POST["txt_newpassword"];
	$rePassword=$_POST["txt_repassword"];
	
	$sel="select * from tbl_workshop where workshop_id='".$_SESSION["wid"]."'";
	$row=$conn->query($sel);
	$data=$row->fetch_assoc();
	$dbPassword = $data["workshop_password"];
		
		if($dbPassword==$currentPassword)
		{
				if($newPassword==$rePassword)
				{
				$up="update tbl_workshop set workshop_password='".$newPassword."' where workshop_id='".$_SESSION["wid"]."'";
					 
				
					if($conn->query($up))
					{
					echo "<script>alert('Updated')</script>";
					}
				}
				else
				{
					echo "<script>alert('Password Missmatch')</script>";
				}
		}
		else
		{
			echo "<script>alert('Incorrect Current Password')</script>";		
		}
}
include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
</head>

<body>

<div id="tab" align="center">
<div align="center" id="tab">
<h1>Change Password</h1>
<br /><br />
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr align="center">
      <td>Current Password</td>
      <td><input type="password" name="txt_password" id="txt_password"  required="required" autocomplete="off"  pattern="[0-9a-zA-Z!@#$%^&*]{8,}"/></td>
    </tr>
    <tr align="center">
      <td>New Password</td>
      <td><input type="password" name="txt_newpassword" id="txt_newpassword"  required="required" autocomplete="off"  pattern="[0-9a-zA-Z!@#$%^&*]{8,}"/></td>
    </tr>
    <tr align="center">
      <td>Re-Password</td>
      <td><input type="password" name="txt_repassword" id="txt_repassword"  required="required" autocomplete="off"  pattern="[0-9a-zA-Z!@#$%^&*]{8,}"/></td>
    </tr>
    <tr align="center">
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_save" id="btn_save" value="Submit" />
      </div></td>
    </tr>
  </table>
</form>
</div>

</body>
<?php
include("Foot.php");
?>
</html>