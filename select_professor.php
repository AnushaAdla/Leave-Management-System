<?php
include('connect.php');
extract($_REQUEST);

$row=mysql_query("SELECT DISTINCT(name),id FROM app_form WHERE dept='".$val."'");
while($result = mysql_fetch_array($row))
{?>
	<option value="<?php echo $result['id'];?>"><?php echo $result['name'];?></option>
	<?php
}	
?>