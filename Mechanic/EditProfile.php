<?php
session_start();
include('../Assets/Connection/Connection.php');
if(isset($_POST['btn_Submit']))
{
	
	$name = $_POST["txt_name"] ;
	$contact = $_POST["txt_contact"] ;
	$email = $_POST["txt_email"] ;
	$address = $_POST["txt_address"] ;

	$up = "update tbl_mechanic set mechanic_name='".$name."',mechanic_contact='".$contact."',mechanic_email='".$email."',mechanic_address='".$address."' where mechanic_id='".$_SESSION["mid"]."'";
	
	if($conn->query($up))
	{

				?>
					<script>
                    alert("Updated..")
					location.href="EditProfile.php";
                    </script>
					<?php
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
<title>Edit Profile</title>

</head>

<body>

<div align="center" id="tab">
<h1>Edit Profile</h1>
<br><br>
<form id="form1" name="form1" method="post" action="">

  <?php



$sel="select * from tbl_mechanic where mechanic_id='".$_SESSION["mid"]."'";
$row=$conn->query($sel);
if($data=$row->fetch_assoc())
{
?>
  <table>
    <tr align="center">
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" value="<?php echo $data["mechanic_name"];?>" id="txt_name" /></td>
    </tr>
    <tr align="center">
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" value="<?php echo $data["mechanic_contact"];?>" id="txt_contact" /></td>
    </tr>
    <tr align="center">
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email"  value="<?php echo $data["mechanic_email"];?>" id="txt_email" /></td>
    </tr>
    <tr align="center">
      <td>Address</td>
      <td><label for="txt_address"></label>
    <textarea name="txt_address"  id="txt_address" cols="35" rows="3"><?php echo $data["mechanic_address"];?></textarea></td>
    
    </tr>
    <tr align="center">
      <td colspan="2" align="center"><input type="submit" name="btn_Submit" id="btn_Submit" value="Submit" /></td>
    </tr>
  </table>
 
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
