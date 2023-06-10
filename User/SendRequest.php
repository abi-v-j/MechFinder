<?php
include("SessionValidator.php");
include("../Assets/Connection/Connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMail/src/Exception.php';
require 'phpMail/src/PHPMailer.php';
require 'phpMail/src/SMTP.php';

if(isset($_GET["ch"]))
	{
		$_SESSION["ch"]=$_GET["ch"];
		$_SESSION["mail"]=$_GET["mail"];
		header("Location:SendRequest.php");
	}
	


if(isset($_POST["btnsend"]))
{
	
		$complaint=$_POST["txtdetails"];
		
	 $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'mechfinder678@gmail.com'; // Your gmail
    $mail->Password = 'viemehoiuftqqvsa'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('mechfinder678@gmail.com'); // Your gmail
  
    $mail->addAddress($_SESSION["mail"]);
  
    $mail->isHTML(true);
  
    $mail->Subject = "MechFinder ";
    $mail->Body = "A new Request has recieved for you  ".$complaint." ";
  if($mail->send())
  {
    echo "Sended";
  }
  else
  {
    echo "Failed";
  }
	

		
				
		
				$insqry="insert into tbl_request(request_details,request_date,workshop_id,user_id)values('".$complaint."',curdate(),'".$_SESSION["ch"]."','".$_SESSION["uid"]."')";
				if($conn->query($insqry))
				{
					
				?>
					<script>
                    alert("Success..")
					location.href="ViewRequest.php";
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
<title>Send Request</title>
</head>

<body>
<div id="tab" align="center">
<h2>Request</h2>
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr align="center">
      <td>Details</td>
      <td><textarea name="txtdetails" id="txtdetails" cols="45" rows="5"></textarea></td>
    </tr>
    <tr align="center">
      <td height="23" colspan="2"><div align="center">
        <input type="submit" name="btnsend" id="btnsend" value="Submit" />
        <input type="reset" name="btncancel" id="btncancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>
</body>
<?php
include("Foot.php");
?>
</html>