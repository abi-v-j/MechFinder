<?php
include("../Assets/Connection/Connection.php");
include("Head.php");

if(isset($_POST["btnsave"]))
{
	$district=$_POST["seldistrict"];
	$place=$_POST["txtplace"];
	$sel="select * from tbl_place where place_name='".$place."'";
		$re=$conn->query($sel);
		
		
		if($row= $re->fetch_assoc())
		{
			        ?>
						<script>
                        alert('Already Exist');
                        window.location='PlaceDetails.php';
                        </script>
                    <?php
				}
		else
		{
			
				$insqry="insert into tbl_place(place_name,district_id)values('".$place."','".$district."')";
				if($conn->query($insqry))
				{		
									
						?>
						<script>
						window.location='PlaceDetails.php';
						</script>
						<?php
				}
				
			
			}
		
}

if(isset($_GET["m"]))
{
	$delqry="delete from tbl_place where place_id='".$_GET["m"]."'";
	$conn->query($delqry);
	                    ?>
						<script>
						window.location='PlaceDetails.php';
						</script>
						<?php
}

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place Details</title>
</head>

<body>
<div id="tab">
<h1 align="center">Place</h1>
<br/><br/>
<form id="form1" name="form1" method="post" action="">
  <table  border="1" align="center" cellpadding="10">
    <tr align="center">
		
      <td>District</td>
      <td><label for="seldistrict"></label>
        <select name="seldistrict" id="seldistrict">
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
    <tr align="center">
		
      <td>Place</td>
      <td><label for="txtplace"></label>
      <input type="text" name="txtplace" id="txtplace" required autocomplete="off"/></td>
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
		
      <th >Si.no</th>
       <th >District</th>
      <th >Places</th>
      <th colspan="2"><div align="center">Action</div></th>
    </tr>
   
    
<?php
$i=0;

$selqry = "select * from tbl_place p inner join tbl_district d on d.district_id=p.district_id";
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
                  
       		<td align="center">
        <a href="PlaceDetails.php?m=<?php echo $row["place_id"];?>">Delete</a></td></tr>
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