<?php
if($page=="create-stockadjustment"){
	$found=include("views/pages/stockadjustment/create_stockadjustment.php");
}elseif($page=="edit-stockadjustment"){
	$found=include("views/pages/stockadjustment/edit_stockadjustment.php");
}elseif($page=="stock_adjustments"){
	$found=include("views/pages/stockadjustment/manage_stockadjustment.php");
}elseif($page=="details-stockadjustment"){
	$found=include("views/pages/stockadjustment/details_stockadjustment.php");
}elseif($page=="view-stockadjustment"){
	$found=include("views/pages/sales/stockadjustment/view_stockadjustment.php");
}
?>
