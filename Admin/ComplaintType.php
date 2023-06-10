<?php
include("../Assets/Connection/Connection.php");

include("Head.php");

if(isset($_POST["btnsave"]))
{
	$complaint=$_POST["txtct"];
	$sel="select * from tbl_complainttype where complainttype_name='".$complaint."'";
		$re=$conn->query($sel);
		
		
		if($row= $re->fetch_assoc())
		{
			        ?>
						<script>
                        alert('Already Exist');
                        window.location='ComplaintType.php';
                        </script>
                    <?php
				}
		else
		{
			
				$insqry="insert into tbl_complainttype(complainttype_name)values('".$complaint."')";
				if($conn->query($insqry))
				{		
			        ?>
						<script>
                        window.location='ComplaintType.php';
                        </script>
                    <?php
						}
				
			
			}
		
}

if(isset($_GET["del"]))
{
	$delqry="delete from tbl_complainttype where complainttype_id='".$_GET["del"]."'";
	$conn->query($delqry);
			        ?>
						<script>
                        window.location='ComplaintType.php';
                        </script>
                    <?php
		}

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint Type</title>
</head>

<body>
<h1 align="center">Complaint Type</h1>
<div id="tab">
<br/><br/>
<form id="form1" name="form1" method="post" action="">
  <table border="1"align="center" cellpadding="5">
    <tr align="center">
		
      <td>Complaint Type</td>
      <td><input type="text" name="txtct" id="txtct" required autocomplete="off" /></td>
    </tr>
    <tr align="center">
		
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsave" id="btnsave" value="Submit" />
      </div></td>
    </tr>
  </table>
  </form>
  <br /> <br /> <br /> 
  <br />
   <table border="1"al align="center"cellpadding="5">
    <tr align="center">
		
      <th >Sl.no</th>
      <th>Complaint Type</th>
      <th colspan="2"><div align="center">Action</div></th>
    </tr>
   
    
<?php
$i=0;

$selqry = "select * from tbl_complainttype";
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
       		<td width="132"colspan="2"align="center">
        <a href="ComplaintType.php?del=<?php echo $row["complainttype_id"];?>">Delete</a></td></tr>
        <?php
}

?>   

   
  </table>
</div>
</body>
<?php
include("Foot.php");
?>
</html>