<?php
session_start();

include("../Assets/Connection/Connection.php");
if(isset($_POST["btnsubmit"]))
{
	$name=$_POST["txtname"];
	$contact=$_POST["txtcontact"];
	$email=$_POST["txtemail"];
	$address=$_POST["txtaddress"];
	$password=$_POST["txtpassword"];
	$photo=$_FILES["photo"]["name"];
	$temp=$_FILES["photo"]["tmp_name"];
	move_uploaded_file($temp,'../Assets/File/Workshop/'.$photo);
	
	
	
		$insqry="insert into tbl_mechanic(mechanic_name,mechanic_contact,mechanic_email,mechanic_address,mechanic_password,mechanic_photo,mechanic_doj,workshop_id)values('".$name."','".$contact."','".$email."','".$address."','".$password."','".$photo."',curdate(),'".$_SESSION["wid"]."')";
		
			if($conn->query($insqry))
			{
				?>
					<script>
                    alert("Inserted..")
					location.href="MechanicRegistration.php";
                    </script>
					<?php
			}
			else
			{
				?>
					<script>
                    alert("Failed..")
					location.href="MechanicRegistration.php";
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
<title>Mechanic Registration</title>
</head>

<body>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table>
    <tr align="center">
      <td>Name</td>
      <td><input type="text" name="txtname" id="txtname" required autocomplete="off"/></td>
    </tr>
    <tr align="center">
      <td>Contact</td>
      <td><input type="text" name="txtcontact" id="txtcontact" required pattern="[0-9]{10,10}" autocomplete="off"/></td>
    </tr>
    <tr align="center">
      <td>Email</td>
      <td><input type="email" name="txtemail" id="txtemail" required autocomplete="off"/></td>
    </tr>
    <tr align="center">
      <td>Address</td>
      <td><textarea name="txtaddress" id="txtaddress" cols="45" rows="5" required></textarea></td>
    </tr>
    <tr align="center">
      <td>Photo</td>
      <td><input name="photo" type="file" id="txtphoto" required/></td>
    </tr>
    <tr align="center">
      <td>Password</td>
      <td><input type="password" name="txtpassword" id="txtpassword"  required="required" autocomplete="off"  pattern="[0-9a-zA-Z!@#$%^&*]{8-16}"/></td>
    </tr>
    <tr align="center">
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      </div></td>
    </tr>
  </table>
  <div align="center"></div>
</form>
<div align="center"></div>
</body>
<?php
include("Foot.php");
?>
</html>