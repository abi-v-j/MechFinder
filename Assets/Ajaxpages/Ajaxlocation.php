
<?php
include("../Connection/Connection.php");

?>

<option value="">---location---</option>

<?php

$sel="select * from tbl_location where place_id='".$_GET["did"]."'";
$re=$conn->query($sel);
		while($row=$re->fetch_assoc())
		{
			?>
            <option value="<?php echo $row["location_id"];?>"><?php echo $row["location_name"];?></option>
            <?php
		}
	



?>