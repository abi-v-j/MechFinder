
<?php
include("../Connection/Connection.php");

?>

<option value="">---Select---</option>

<?php

$sel="select * from tbl_subcategory where category_id='".$_GET["did"]."'";
$re=$conn->query($sel);
		while($row=$re->fetch_assoc())
		{
			?>
            <option value="<?php echo $row["subcategory_id"];?>"><?php echo $row["subcategory_name"];?></option>
            <?php
		}
	



?>