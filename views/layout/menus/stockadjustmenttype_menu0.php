<?php
	echo main_sidebar_dropdown([
		"name"=>"StockAdjustmentType",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			["route"=>"create-stockadjustmenttype","text"=>"Create StockAdjustmentType","icon"=>"far fa-circle nav-icon"],
			["route"=>"stock_adjustment_types","text"=>"Manage StockAdjustmentType","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
