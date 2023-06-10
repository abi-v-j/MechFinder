<?php
include("../Assets/Connection/Connection.php");

include("Head.php");


	if(isset($_POST["btnsave"]))
	{
		$district=$_POST["txtdistrict"];
		$sel="select * from tbl_district where district_name='".$district."'";
		$re=$conn->query($sel);
		$hid=$_POST["txthidden"];
		
		if($row= $re->fetch_assoc())
		{
			        ?>
						<script>
                        alert('Already Exist');
                        window.location='DistrictDetails.php';
                        </script>
                    <?php
				}
		else
		{
			if($hid!="")
			{
				$update="update tbl_district set district_name='".$district."' where district_id='".$hid."'";
				if($conn->query($update))
				{
			        ?>
						<script>
                        window.location='DistrictDetails.php';
                        </script>
                    <?php
		}
				else
				{
			        ?>
						<script>
                        alert('Updated Failed');
                        window.location='DistrictDetails.php';
                        </script>
                    <?php
		}
			}
			else
			{
				$insqry="insert into tbl_district(district_name)values('".$district."')";
			if($conn->query($insqry))
			{
			        ?>
						<script>
                        window.location='DistrictDetails.php';
                        </script>
                    <?php
		}
			else
			{
			        ?>
						<script>
                        alert('Failed');
                        window.location='DistrictDetails.php';
                        </script>
                    <?php
		}
			
			}
		}
	}
	$eid="";
	$ename="";
	
	if(isset($_GET["ch"]))
	{
		$selqry = "select * from tbl_district where district_id='".$_GET["ch"]."'";
		$results = $conn->query($selqry);
		if($rows = $results->fetch_assoc())
		{
			$eid=$rows["district_id"];
			$ename=$rows["district_name"];
		}
	}
	if(isset($_GET["m"]))
	{
		$delqry="delete from tbl_district where district_id='".$_GET["m"]."'";
		$conn->query($delqry);
			        ?>
						<script>
                        window.location='DistictDetails.php';
                        </script>
                    <?php
			}
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
</head>

<body>
<div id="tab">
<h1 align="center">District</h1>
<br/><br/>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" cellpadding="5">
    <tr align="center">
      <td>District</td>
      <td><label for="txtdis"></label>
      <input type="hidden" name="txthidden" value="<?php echo $eid ?>"/>
      <input type="text" name="txtdistrict" id="txtdis" value="<?php echo $ename?>" required autocomplete="off" /></td>
    </tr>
    <tr align="center">
		
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsave" id="btnsub" value="Save" />
      </div></td>
    </tr>
  </table>
  <br /><br/>
  <table border="1" align="center" cellpadding="5">
    <tr align="center">
		
      <th >Si.no</th>
      <th >District</th>
      <th colspan="2"><div align="center">Action</div></th>
    </tr>
   
    
<?php
$i=0;

$selqry = "select * from tbl_district";
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
            <?php echo $row["district_name"];?>
            </td>           
       		<td colspan="2"align="center"><a href="DistrictDetails.php?ch=<?php echo $row["district_id"];?>">Edit</a>&nbsp;&nbsp;&nbsp;
        <a href="DistrictDetails.php?m=<?php echo $row["district_id"];?>">Delete</a></td></tr>
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