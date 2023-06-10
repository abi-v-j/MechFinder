<?php
include('../Assets/Connection/Connection.php');
include("SessionValidator.php");
include("Head.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Profile</title>
</head>

<body>

<div id="tab" align="center">
<?php
$sel="select * from tbl_workshop where workshop_id='".$_SESSION["wid"]."'";

$row=$conn->query($sel);
if($data=$row->fetch_assoc())

{
?>

  <table>
  <tr align="center">
      <td colspan="2" align="center"><img src="../Assets/File/Workshop/<?php echo $data["workshop_logo"];?>" width="120" height="120" /></td>
    </tr>
    <tr align="center">
      <td>Name</td>
      <td><?php echo $data["workshop_name"];?></td>
    </tr>
    <tr align="center">
      <td>Contact</td>
      <td><?php echo $data["workshop_contact"];?></td>
    </tr>
    <tr align="center">
      <td>Email</td>
      <td><?php echo $data["workshop_email"];?></td>
    </tr>
    <tr align="center">
      <td>Address</td>
      <td><label for="txt_address"></label><?php echo $data["workshop_address"];?></td>
    </tr>
  </table>
   <?php
  
  }
  
  ?>
  </body>
  <?php
  include("Foot.php");
  ?>
</html>