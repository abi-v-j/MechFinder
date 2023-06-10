<?php
include("SessionValidator.php");
include("../Assets/Connection/Connection.php");
if(isset($_POST["btnsave"]))
{
	$complaint_type=$_POST["selcomplaint_type"];
	$complaint=$_POST["txtcomplaint"];
	
			
				$insqry="insert into tbl_complaint(complainttype_id,complaint_content,complaint_date,user_id)values('".$complaint_type."','".$complaint."',curdate(),'".$_SESSION["uid"]."')";
				if($conn->query($insqry))
				{		
					header("Location:complaint.php");
				}
				
			
			
		
}
include("Head.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>complaint Details</title>
</head>

<body>
<div align="center" id="tab">
<h1>Complaint</h1><br />

<form id="form1" name="form1" method="post" action="">
  <table>
    <tr align="center">
      <td>Complaint type</td>
      <td><label for="selcomplaint_type"></label>
        <select name="selcomplaint_type" id="selcomplaint_type">
        <option>----Select----</option>
        <?php
		$selqry="select * from tbl_complainttype";
		$re=$conn->query($selqry);
		while($row=$re->fetch_assoc())
		{
			?>
            <option value="<?php echo $row["complainttype_id"];?>"><?php echo $row["complainttype_name"];?></option>
            <?php
		}
		?>
      </select></td>
    </tr>
    <tr align="center">
      <td>Complaint</td>
      <td><label for="txtcomplaint"></label>
      <input type="text" name="txtcomplaint" id="txtcomplaint" required="required" autocomplete="off"/></td>
    </tr>
    <tr align="center">
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsave" id="btnsave" value="Save" />&nbsp;&nbsp;
         <input type="reset" name="btncal" id="btncal" value="Cancel" />
      </div></td>
    </tr>
  </table>
 <br /> <br /> <br /> 
   <table>
    <tr align="center">
      <th>Si.no</th>
       <th>Complaint type</th>
        <th>Date</th>
      <th>Complaints</th>
            <th>Reply</th>

    </tr>
   
    
<?php
$i=0;

$selqry = "select * from tbl_complaint c inner join tbl_complainttype t on c.complainttype_id=t.complainttype_id inner join tbl_user s on c.user_id=s.user_id  where c.user_id='".$_SESSION["uid"]."'";
$result=$conn->query($selqry);
while($row = $result->fetch_assoc())
{
	$i++;
?>
		<tr align="center">
        	<td>
            <?php echo $i;?>
            </td>
            <td>
            <?php echo $row["complainttype_name"];?>
            </td>   
             <td>
            <?php echo $row["complaint_date"];?>
            </td>
             <td>
            <?php echo $row["complaint_content"];?>
            </td>   
             <td>
            <?php echo $row["complaint_reply"];?>
            </td>   
                  
       		
        
        <?php
}

?>   

   
  </table>
</form>
</body>
<?php
include("Foot.php");
?>
</html>