<?php
if($page=="create-position"){
	$found=include("views/pages/ui/position/create_position.php");
}elseif($page=="edit-position"){
	$found=include("views/pages/ui/position/edit_position.php");
}elseif($page=="positions"){
	$found=include("views/pages/ui/position/manage_position.php");
}elseif($page=="details-position"){
	$found=include("views/pages/ui/position/details_position.php");
}elseif($page=="view-position"){
	$found=include("views/pages/ui/position/view_position.php");
}
?>
