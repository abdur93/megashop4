<?php
	echo main_sidebar_dropdown([
		"name"=>"Stock",
		"icon"=>"nav-icon fas fa-store",
		"links"=>[
			["route"=>"stocks","text"=>"Manage Stock","icon"=>"far fa-circle nav-icon"],
			["route"=>"warehouses","text"=>"Manage Warehouse","icon"=>"far fa-circle nav-icon"],
			["route"=>"stock_adjustments","text"=>"Manage Stock Adjustment","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
