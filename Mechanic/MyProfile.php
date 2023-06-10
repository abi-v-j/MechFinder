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


 <!--
        <meta charset="utf-8">
        <title>AutoWash - Car Wash Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
      <!-- /* <link href="img/favicon.ico" rel="icon">

         Google Font 
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"> 
        
         CSS Libraries 
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

         Template Stylesheet -->
        <!--<link href="css/style.css" rel="stylesheet">*/-->-->
   


</head>

<body>

<div align="center" id="tab">
<?php

$sel="select * from tbl_mechanic where mechanic_id='".$_SESSION["mid"]."'";
$row=$conn->query($sel);
if($data=$row->fetch_assoc())

{
?>

  <table>      
    <tr align="center">
      <td colspan="2" align="center"><img src="../Assets/File/Workshop/<?php echo $data["mechanic_photo"];?>" width="120" height="120" /></td>
    </tr>
    <tr align="center">
      <td>Name</td>
      <td><?php echo $data["mechanic_name"];?></td>
    </tr>
    <tr align="center">
      <td>Contact</td>
      <td><?php echo $data["mechanic_contact"];?></td>
    </tr>
    <tr align="center">
      <td>Email</td>
      <td><?php echo $data["mechanic_email"];?></td>
    </tr>
    <tr align="center">
      <td>Address</td>
      <td><label for="txt_address"></label><?php echo $data["mechanic_address"];?></td>
    </tr>
  </table>
   <?php
  
  }
  
  ?>
 <!-- 
  <div class="team">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                            <div class="team-img">
                            <?php /*?>    <img src="../Assets/File/Workshop/<?php echo $data["mechanic_photo"];?>" alt="Team Image">
                            </div>
                            <div class="team-text">
                                <h2><?php echo $data["mechanic_name"];?></h2>
                                <p><?php echo $data["mechanic_contact"];?></p>  
                                <p><?php echo $data["mechanic_email"];?></p> <?php */?>
                                <p>Engineer</p>                               
                            </div>             
                    </div>
                 </div>
            </div>
        </div>-->
  
  
  </body>
  <?php
  include("Foot.php");
  ?>
</html>