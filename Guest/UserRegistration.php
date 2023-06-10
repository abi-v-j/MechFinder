<?php
include("../Assets/Connection/Connection.php");

		
	

if(isset($_POST["btnsave"]))
{
	$name=$_POST["txtname"];
	$contact=$_POST["txtcontact"];
	$email=$_POST["txtemail"];
	$gender=$_POST["btngen"];
	$address=$_POST["txtadd"];
	$dob=$_POST["txtdate"];
	$password=$_POST["txtpassword"];
	$repassword=$_POST["txtrepassword"];
	$place=$_POST["txtplace"];
	$photo=$_FILES["photo"]["name"];
	$temp=$_FILES["photo"]["tmp_name"];
	move_uploaded_file($temp,'../Assets/File/User/'.$photo);
	
	
	if($password==$repassword)
	{
	
	
	
		$insqry="insert into tbl_user(user_name,user_contact,user_email,user_gender,user_address,user_dob,user_password,place_id,user_photo,user_doj)values('".$name."','".$contact."','".$email."','".$gender."','".$address."','".$dob."','".$password."','".$place."','".$photo."',curdate())";

			if($conn->query($insqry))
			{
				?>
					<script>
                    alert("Inserted..");
					location.href="UserRegistration.php";
                    </script>
					<?php
			}
			else
			{
				?>
					<script>
                    alert("Failed..");
					location.href="UserRegistration.php";
                    </script>
					<?php
			}
	}
	else
	{
		?>
					<script>
                    alert("Passwords Not Match");
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
<title>User Registration</title>
</head>

<body>
<div id="tab" align="center">
<h2>User Registration</h2>
<form id="form1" name="form1" enctype="multipart/form-data" method="post" action="">

<table>
<tr>
    <td><p>District</p></td>
    <td>
      <select name="txtdis" id="txtdis" onChange="getPlace(this.value)">
        
        <option>----Select----</option>
        <?php
		$selqry="select * from tbl_district";
		$re=$conn->query($selqry);
		while($row=$re->fetch_assoc())
		{
			?>
        <option value="<?php echo $row["district_id"];?>"><?php echo $row["district_name"];?></option>
        <?php
		}
		?>
      </select></td>
  </tr>
  <tr>
    <td>Place</td>
    <td>
      <select name="txtplace" id="txtplace">
      <option value="">---select---</option>
      </select></td>
  </tr>
  <tr>
    <td>Name</td>
    <td><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" required autocomplete="off" /></td>
  </tr>
  <tr>
    <td><p>Contact</p></td>
    <td><label for="txtcontact"></label>
      <input type="text" name="txtcontact" id="txtcontact" required pattern="[0-9]{10,10}" autocomplete="off"/></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><label for="txtemail"></label>
      <input type="email" name="txtemail" id="txtemail" required autocomplete="off"/></td>
  </tr>
  <tr>
    <td>Gender</td>
    <td><input type="radio" name="btngen" id="btngen" value="Male" />
      <label for="btnmale">Male</label>
        <input type="radio" name="btngen" id="btngen" value="Female" />
       <label for="btnfemale">Female</label></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><label for="txtadd"></label>
      <textarea name="txtadd" id="txtadd" cols="45" rows="5" required></textarea></td>
  </tr>
  
 
  <tr>
    <td>DOB</td>
    <td><input type="date" name="txtdate" id="txtdate" required autocomplete="off"/></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><label for="txtpassword"></label>
      <input type="password" name="txtpassword" id="txtpassword" required autocomplete="off" pattern="[0-9a-zA-Z!@#$%^&*]{8,}"/></td>
  </tr>
    <tr>
    <td>Re-Password</td>
    <td><label for="txtrepassword"></label>
      <input type="password" name="txtrepassword" id="txtrepassword" required autocomplete="off" /></td>
  </tr>
   <tr>
    <td>Photo</td>
    <td> <input type="file" name="photo" id="photo" required autocomplete="off"/></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="btnsave" id="btnsave" value="Submit" />&nbsp;&nbsp;&nbsp;
       <input type="reset" name="btncancel" id="btncancel" value="Cancel" />
    </div></td>
    </tr>
</table>
</form>
<script src="../Assets/JQ/jQuery.js"></script> 
<script >
function getPlace(did)
{

	$.ajax({
	  url:"../Assets/Ajaxpages/Ajaxplace.php?did="+did,
	  success: function(html){
		$("#txtplace").html(html);
	  }
	});
}

</script>

</body>
<?php
include("Foot.php");
?>
</html>
