<?php
require_once('../model/database.php');
require_once('../model/orderstatus.php');

if (!isset($orderStatus)){
	$orderStatus=2;
}
$list = OrderStatus::loadAll(Database::getDB());
?>
<select name="orderstatus" size="1">
<?php 
if (isset($allstatusesflag)&&$allstatusesflag){
	echo "<option value=\"all\">all</option>";
}

foreach ($list as $item) {
	$selected='';
	$val=$item->getId();
	$name=$item->getOrderStatus();
	if (($val==$orderStatus)||($name==$orderStatus)){
		$selected='selected';
	}
	echo "<option value=\"$val\" $selected>$name</option>";
}
?>
</select> 