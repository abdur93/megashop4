<?php
if($page=="create-order_detail"){
	$found=include("views/pages/ui/order_detail/create_order_detail.php");
}elseif($page=="edit-order_detail"){
	$found=include("views/pages/ui/order_detail/edit_order_detail.php");
}elseif($page=="manage-order_detail"){
	$found=include("views/pages/ui/order_detail/manage_order_detail.php");
}elseif($page=="details-order_detail"){
	$found=include("views/pages/ui/order_detail/details_order_detail.php");
}elseif($page=="view-order_detail"){
	$found=include("views/pages/ui/order_detail/view_order_detail.php");
}
?>
