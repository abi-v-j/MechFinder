
<?php
include("../Connection/Connection.php");

?>

<option value="">---place---</option>

<?php

$sel="select * from tbl_place where district_id='".$_GET["did"]."'";
$re=$conn->query($sel);
		while($row=$re->fetch_assoc())
		{
			?>
            <option value="<?php echo $row["place_id"];?>"><?php echo $row["place_name"];?></option>
            <?php
		}
	



?>