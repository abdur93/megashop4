<?php
	echo main_sidebar_dropdown([
		"name"=>"OrderDetail",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			["route"=>"create-orderdetail","text"=>"Create OrderDetail","icon"=>"far fa-circle nav-icon"],
			["route"=>"order_details","text"=>"Manage OrderDetail","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
