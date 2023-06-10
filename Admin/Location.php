<?php
include("../Assets/Connection/Connection.php");
include("Head.php");

if(isset($_POST["btnsave"]))
{
	$place=$_POST["selplace"];
	$location=$_POST["txtlocation"];
	$sel="select * from tbl_location where location_name='".$location."'";
		$re=$conn->query($sel);
		
		
		if($row= $re->fetch_assoc())
		{
			        ?>
						<script>
                        alert('Already Exist');
                        window.location='Location.php';
                        </script>
                    <?php
				}
		else
		{
			
				$insqry="insert into tbl_location(location_name,place_id)values('".$location."','".$place."')";
				if($conn->query($insqry))
				{		
					
						?>
						<script>
						alert('Updated');
						window.location='Location.php';
						</script>
						<?php
				}
				
			
			}
		
}

if(isset($_GET["m"]))
{
	$delqry="delete from tbl_location where location_id='".$_GET["m"]."'";
	$conn->query($delqry);
			        ?>
						<script>
                        window.location='Location.php';
                        </script>
                    <?php
		}

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Location</title>
</head>

<body>
<div id="tab">
<h1 align="center">Location</h1>
<br/><br/>
<form id="form1" name="form1" method="post" action="">
  <table  border="1" align="center" cellpadding="10">
    <tr align="center">
      <td>Place</td>
      <td><label for="selplace"></label>
        <select name="selplace" id="selplace">
        <option>----Select----</option>
        <?php
		$selqry="select * from tbl_place";
		$re=$conn->query($selqry);
		while($row=$re->fetch_assoc())
		{
			?>
            <option value="<?php echo $row["place_id"];?>"><?php echo $row["place_name"];?></option>
            <?php
		}
		?>
      </select></td>
    </tr>
    <tr align="center">
      <td>Location</td>
      <td><label for="txtlocation"></label>
      <input type="text" name="txtlocation" id="txtlocation" required autocomplete="off"/></td>
    </tr>
    <tr align="center">
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsave" id="btnsave" value="Save" />
      </div></td>
    </tr>
  </table>
 <br /> <br /> <br /> 
   <table  border="1" align="center" cellpadding="10">
    <tr align="center">
      <th>Si.no</th>
       <th>District</th>
       <th>Place</th>
      <th>Location</th>
      <th colspan="2"><div align="center">Action</div></th>
    </tr>
   
    
<?php
$i=0;

$selqry = "select * from tbl_location l inner join tbl_place p on l.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id";
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
            <td>
            <?php echo $row["place_name"];?>
            </td>   
             <td>
            <?php echo $row["location_name"];?>
            </td>   
                  
       		<td align="center">
        <a href="Location.php?m=<?php echo $row["location_id"];?>">Delete</a></td></tr>
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